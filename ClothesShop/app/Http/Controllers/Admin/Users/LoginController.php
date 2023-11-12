<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Users\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //
    protected $userservice;
    public function __construct(UsersService $usersService){
        $this->userservice = $usersService;
    }
    public function index() {
      return view('admin.users.login',[
          'title'=>'Đăng Nhập',
      ]);
    }
    public function store(Request $request){

        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=> 'required|min:6|max:20',
        ]);
        // dd($request->input());
        if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')],$request->input('remember')) && $this->userservice->assetAdmin($request->input('email'))==true){
            session::put('examlogin',true);
            return redirect()->route('admin');
        }
        else if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')],$request->input('remember')) && $this->userservice->assetAdmin($request->input('email'))==false){
            session::put('examlogin',true);
            return redirect()->route('home');
        }
        else{
            Session::flash('error','Email hoặc Password không đúng');// hàm thực hiện thiết lập báo lỗi
            return redirect()->back();
        }
        // return view('admin.users.login',[
        //     'title'=>'Trang chủ admin',
        // ]);
    }
    public function logout()
    {
        Auth::logout();
        session::forget('examlogin');
        session::forget('userid');
        return redirect('/admin/users/login'); // Điều hướng đến trang đăng nhập hoặc trang khác
    }
}
