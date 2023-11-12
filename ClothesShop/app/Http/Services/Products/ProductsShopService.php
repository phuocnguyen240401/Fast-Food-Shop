<?php
namespace App\Http\Services\Products;
use App\Models\Product;// tên đường dẫn của file này
class ProductsShopService {
    const LIMIT = 12;
    public function getNew(){

       return Product::select('id','name','price','price_sale','thumb')->where('active',1)->orderByDesc('updated_at')->limit(4)->get();

    }
    public function getGoodPrice($page = null){

        return Product::select('id','name','price','price_sale','thumb')
        ->where('active',1)
        ->orderByRaw('(price - price_sale) DESC')
        ->when($page!=null, function($query) use($page){
            $query->offset($page*self::LIMIT);
        })
        ->limit(self::LIMIT)->get();
    }
    public function getProductDetail($id){
        return Product::select('id','name','price','price_sale','thumb','menu_id','description','content')->with('menu')
        ->where('id',$id)->firstOrFail();


    }

}
