<?php
namespace App\Http\Services\Products; // tên đường dẫn của file này\
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductsService {

    public function getMenu(){
        return Menu::where('active',1)->get();
    }
    public function isValidPrice($request){
        if($request->input('price')==null){
            Session::flash('error','Giá gốc sản phẩm không được để trống');
            return false;
        }
        if ($request->input('price')<0){
            Session::flash('error','giá sản phẩm phải lớn hơn 0, muốn cho miễn phí thì giá là 0');
            return false;
        }
        if($request->input('price_sale')<0 && $request->input('price_sale')!=null){
            Session::flash('error','giá giảm phải lớn hơn hoặc bằng 0');
            return false;
        }

        if($request->input('price')<$request->input('price_sale')){
            Session::flash('error','giá giảm phải nhỏ hơn giá sản phẩm');
            return false;
        }
        return true;
    }
    public function get() {

        return Product::with('menu')
        ->orderByDesc('id')->paginate(15);
        // thể hiện được sự liên kết giữa Product và menu , và with('menu'), menu là lập tên method ở model
    }

    public function create($request){
        // Product::created([
        //     'name'=> (string)$request->input('name'),
        //     'description'=>(string)$request->input('description'),
        //     'menu_id'=>(int)$request->input('menu_id'),
        //     'content'=>(string)$request->input('content'),
        //     'price'=> (int)$request->input('price'),
        //     'price_sale' => (int)$request->input('price_sale'),
        //     'thumb' => (string) $request->input('thumb'),
        //     'active'=>(int)$request->input('active'),
        // ]);
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice==false){
            return false;
        }
        try{
           // $request->except('_token');// không lấy giá trị token để thêm vào PRoducts
            Product::create($request->all());
            Session::flash('success','Thêm sản phẩm thành công');
        }
        catch(\Exception $error){
            Session::flash('error', 'Thêm sản phẩm bị lỗi');
            Log::error($error->getMessage());
            return false;
        }
    return true;
    }
    public function update($request, $product){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice==false){
            return false;
        }
        try{
            $thumb = $product->thumb;
            $path = str_replace('storage','public',$thumb);
            $product->fill($request->input());
            $product->save();
            if($thumb!=$request->input('thumb')){
                Storage::delete($path);
            }

            Session::flash('success','cập nhật sản phẩm thành công');

        }
        catch(\Exception $error){
            Session::flash('error', 'cập nhật sản phẩm bị lỗi');
            Log::error($error->getMessage());
            return false;
        }
        return true;
    }
    public function delete($productId){
        // check value in Database
        $product = Product::where('id',$productId)->first();
        if($product){
            $path = str_replace('storage','public',$product->thumb);
            Product::where('id',$product->id)->delete();
            Storage::delete($path);
            return true;
        }
        return false;

    }
}
