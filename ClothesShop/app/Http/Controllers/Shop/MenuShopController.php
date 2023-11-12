<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menus\MenusService;
class MenuShopController extends Controller
{
    protected $menuservice;
    public function __construct(MenusService $menuService){
        $this->menuservice = $menuService;
    }
    public function index(Request $request,$id,$slug){
        $menu = $this->menuservice->getId($id);
        $products = $this->menuservice->getProduct($menu,$request);
        $menulist = $this->menuservice->getmenulist($id);
        return view('shop.product.list',[
            'title'=>'Danh sách sản phẩm',
            'products'=> $products,
            'menulist'=> $menulist,
        ]);
    }
}
