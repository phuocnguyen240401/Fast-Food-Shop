<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Cart\CartService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    protected $cartservice;
    public function __construct(CartService $cartService){
        $this->cartservice = $cartService;
    }
    public function index(){
        // $userId = \Illuminate\Support\Facades\Auth::id();
        return view('shop.main.profile',[
            'title'=>'Thông tin tài khoản',
            'customer'=>$this->cartservice->getprofile(),
        ]);
    }
    public function updateprofile(Request $request){
        $this->cartservice->updateprofile($request);
        return redirect('/profile');
    }
}
