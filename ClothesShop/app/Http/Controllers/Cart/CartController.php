<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartservice;
    public function __construct(CartService $cartService){
        $this->cartservice = $cartService;
    }
    public function index(Request $request){
        $result = $this->cartservice->create($request);
        if($result==false){
            return redirect()->back();
        }
        else{
            return redirect('/carts');
        }
    }
    public function show(){
        $products = $this->cartservice->getProducts();
        return view('shop.carts.list',[
            'title'=> 'Giỏ hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
        ]);
    }
    public function update(Request $request){
       $this->cartservice->update($request);
       return redirect('/carts');
    }
    public function remove($id=0){
        $this->cartservice->remove($id);
        return redirect('/carts');
    }
    public function buycart(Request $request){
         // kiểm tra xem tài khoản có đủ thông tin chưa, nếu chưa thì return sang chỗ chỉnh sửa thông tin,nếu có thì lưu thông tin sản phẩm vào đơn hàng.
        if($this->cartservice->buyCart())
        {
            return redirect('/targetcart');
        }
        else {
            return redirect('/profile');
        }
    }
    public function targetcart(){
        return view('shop.carts.detail',[
            'title' => 'Theo dõi đơn hàng',
            'products' => $this->cartservice->getproductCart(),
        ]);
    }
    public function destroy($id=0){
        $this->cartservice->destroy($id);
        return redirect('/targetcart');
    }
}
