<?php
namespace App\Http\Services\Menus; // tên đường dẫn của file này

use App\Models\Menu;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MenusService {
    public function getParent(){
        // dd(Menu::where('parent_id',0)->get());
        return Menu::where('parent_id',0)->get(); // where là lọc thông tin// get là lấy toàn bộ thông tin

    }
    public function getAll(){
        return Menu::orderbyDesc('id')->get();// orderbyDesc() sắp xếp lớn nhất theo id,->pagrinate(20)// dùng để phân trang
    }
    public function getTop(){
        return Menu::select('id','name','description','thumb')->where('parent_id',0)->where('active',1)->orderByDesc('updated_at')->limit(3)->get() ;
    }
    public function create($request){
        try
        {
            Menu::create([ // cần tạo thêm model Menu để giao tiếp với sql và phương thức create trong model để gọi
                'name'=> (string)$request->input('name'),
                'description'=>(string)$request->input('description'),
                'parent_id'=>(int)$request->input('parent_id'),
                'content'=>(string)$request->input('content'),
                'active'=>(int)$request->input('active'),
                'thumb' => (string) $request->input('thumb'),
            ]);
            Session::flash('success','Thêm Danh sách thành công');
            return true;

         }
        catch(Exception $e) {
            Session::flash('error',$e->getMessage());
            return false;
        };
    }
    public function update($menu,$request){
        try{

            if($menu->id != $request->input('id')){
            $thumb= $menu->thumb;
            $path = str_replace('storage','public',$thumb);
            $menu->name = (string) $request->input('name');
            $menu->description = (string) $request->input('description');
            $menu->content = (string) $request->input('content');
            $menu->active = (int) $request->input('active');
            $menu->parent_id = (int) $request->input('parent_id');
            $menu->thumb = (string) $request->input('thumb');
            $menu->save();
            if($thumb!=$request->input('thumb')){
                Storage::delete($path);
            }
            Session::flash('success','Chỉnh sửa danh mục thành công');
            return true;
            }
        }
        catch(Exception $e){
            Session::flash('error',$e->getMessage());
            return false;
        }

    }
    public function destroy($menuId) {
        // kiểm tra có trong where hay không
        $menu = Menu::where('id',$menuId)->first();

        if($menu){

            return Menu::where('id',$menuId)->orwhere('parent_id',$menuId)->delete();

        }
        return false;
    }
    public function getId($id){
        return Menu::select('id','name','parent_id')->where('id',$id,)->where('active',1)->firstOrFail();
        // lấy được các thông tin của danh mục thuộc id đó
    }
    public function getProduct($menu,$request){
            if($menu->parent_id == 0)  {
                $query = Product::select('products.id','products.name','products.price','products.price_sale','products.thumb')
                ->selectRaw('CASE WHEN products.price_sale IS NOT NULL THEN products.price_sale ELSE products.price END AS price_product')
                ->leftjoin('menus','products.menu_id','=','menus.id')
                ->where('menus.parent_id',$menu->id)
                ->where('products.active',1);

                switch ($request->input('sort')) {
                    case '1':
                        $query->orderBy('products.name','asc');
                        break;
                    case '2':
                        $query->orderBy('products.name','desc');
                        break;
                    case '3':
                        $query->orderBy('price_product','asc');
                        break;
                    case '4':
                        $query->orderBy('price_product','desc');
                        break;
                    default:
                        break;
                }
                switch ($request->input('filter')) {
                    case '1':
                        break;
                    case '2':
                        $query->havingRaw('price_product < 100000');
                        break;
                    case '3':
                        $query->havingRaw('price_product >= 100000 AND price_product < 300000');
                        break;
                    case '4':
                        $query->havingRaw('price_product > 300000');
                        break;
                    case '5':
                        $query->whereNotNull('products.price_sale');
                        break;
                    default:
                        break;
                }
                if($request->input('search-products')){
                    // $query->where('products.name','LIKE','%'.$request->input('search-products').'%');
                    $searchParts = str_split($request->input('search-products'), ceil(strlen($request->input('search-products')) / 4));
                    foreach ($searchParts as $part) {

                        $query->where('products.name', 'like', "%$part%");

                    }
                }
                return $query->orderByDesc('products.id')
                ->paginate(12)->withQueryString();
            }
            else{

                $query = $menu->product()->select('id','name','price','price_sale','thumb')// truy vấn đến giá trị của bảng product thông qua product
                ->selectRaw('CASE WHEN products.price_sale IS NOT NULL THEN products.price_sale ELSE products.price END AS price_product')
                ->where('active',1);
                switch ($request->input('sort')) {
                    case '1':
                        $query->orderBy('products.name','asc');
                        break;
                    case '2':
                        $query->orderBy('products.name','desc');
                        break;
                    case '3':
                        $query->orderBy('price_product','asc');
                        break;
                    case '4':
                        $query->orderBy('price_product','desc');
                        break;
                    default:
                        break;
                }
                switch ($request->input('filter')) {
                    case '1':
                        break;
                    case '2':
                        $query->havingRaw('price_product < 100000');
                        break;
                    case '3':
                        $query->havingRaw('price_product >= 100000 AND price_product < 300000');
                        break;
                    case '4':
                        $query->havingRaw('price_product > 300000');
                        break;
                    case '5':
                        $query->whereNotNull('products.price_sale');
                        break;
                    default:
                        break;
                }
                return $query->orderByDesc('id')
                ->paginate(12)->withQueryString();
            }


    }
    public function getMenuList($id){
        // lay thong tin cua danh muc trong menu-> kiem tra xem no co me va anh chi em khong , neu co thi in het ra
        $menu = Menu::where('id',$id)->where('active',1)->firstOrFail();
        if($menu->parent_id == 0){
            return Menu::select('id','name','thumb','parent_id')->where('id',$id)->where('active',1)->orderBy('parent_id')->get();
            //lay gia tri danh muc con cua cha
        }
        if($menu->parent_id !=0 ) {
            return Menu::select('id','name','thumb','parent_id')->where('id',$id)->orwhere('id',$menu->parent_id)->where('active',1)->orderBy('parent_id')->get();
        }
    }
}
