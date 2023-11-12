<?php
namespace App\Http\Services\Users;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UsersService{
    public function assetAdmin($email){
        $user = User::select('id','property')->where('email',$email)->where('property',1)->first();
        if($user){

            Session::put('userid',$user->id);
            return true;
        }
        else{
            return false;
        }
    }
    public function putUserID($email){
        $user = User::select('id','property')->where('email',$email)->where('property',1)->first();
        return Session::put('userid',$user->id);

    }
    //register
    public function create($request){
        if($request->input('password')!=$request->input('repassword')){
        Session::flash('error','Nhập mật khẩu không chính xác');
        return false;
        }
        if($request->input('aggree')==false){
        Session::flash('error','Bạn chưa đồng ý với điều khoản');
        return false;
        }
        User::create([
            'name'=> (string)$request->input('username'),
            'email'=>(string)$request->input('email'),
            'password'=> (string)bcrypt($request->input('password')),
        ]);
        $user = User::select('id')->where('email',$request->input('email'))->first();
        $this->addCustomer($user->id);
        return true;
    }
    public function addCustomer($userID){
        return Customer::create([
            'user_id'=> $userID,
        ]);
    }
}
