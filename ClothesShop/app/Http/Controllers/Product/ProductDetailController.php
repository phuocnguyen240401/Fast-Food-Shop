<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Products\ProductsShopService;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    protected $productservice;
    public function __construct(ProductsShopService $productsService){
        $this->productservice = $productsService;
    }
    public function show($id='',$slug=''){
        $product = $this->productservice->getProductDetail($id);
        $productsgoodprice=$this->productservice->getNew();
        return view('shop.product.productdetail',[
            'title'=>$product->name,
            'product'=> $product,
            'productsgoodprice'=>$productsgoodprice,
        ]);
    }
}
