<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\RegisterFormRequest;
use App\Http\Services\Users\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    protected $userservice;
    public function __construct(UsersService $usersService){
     $this->userservice = $usersService;
    }
    public function index(){
        return view('admin.users.register',[
            'title'=>'Đăng Kí',
        ]);
    }
    public function store(RegisterFormRequest $request){
       $result=$this->userservice->create($request);
       if($result){
            Session::flash('success','Tạo tài khoản thành công');
            return redirect('admin/users/login');
       }
       else{
        return redirect()->back();
       }
    }
}
