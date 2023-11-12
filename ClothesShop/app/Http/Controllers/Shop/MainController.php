<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Services\Menus\MenusService;
use App\Http\Services\Products\ProductsShopService;
use App\Http\Services\Sliders\SlidersService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    protected $sliderservice;
    protected $menuservice;
    protected $productservice;
    public function __construct(SlidersService $slidersService,MenusService $menusService,ProductsShopService $productsShopService){
        $this->sliderservice = $slidersService;
        $this->menuservice = $menusService;
        $this->productservice = $productsShopService;
    }
    public function index(){
        return view("shop.main.main",[
            'title'=>'Trang chủ',
            'sliders'=>$this->sliderservice->show(),
            'menustop'=> $this->menuservice->getTop(),
            'productsnew'=>$this->productservice->getNew(),
            'productsgoodprice'=> $this->productservice->getGoodPrice(),
        ]);
    }
    public function loadProduct(Request $request){
        $page = (int)$request->input('page',0); // lưu value page gửi từ wiew main bằng ajax
        $result =$this->productservice->getGoodPrice($page); // lưu giá trị là một mảng chứa dữ liệu trong csdl
        if($result){ // if có kết quả từ service thì gửi dữ liệu đến wiew và giá trị được gán là productsgoodprice
            $html = view('shop.main.product',['productsgoodprice'=>$result])->render();
            return response()->json([
                'html' => $html,
            ]); // trả về kiểu dữ liệu với key là html và giá trị là $html
        }
        else{
            return response()->json([
                'html'=> '',
            ]);
        }

    }
}
