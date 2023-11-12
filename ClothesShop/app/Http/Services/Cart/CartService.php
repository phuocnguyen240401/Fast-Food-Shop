<?php

namespace App\Http\Services\Cart;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use App\Jobs\SendMail;
use Exception;
class CartService {
    public function create($request){
        $qty = (int) $request->input('num_product');
        $size = (string) $request->input('getsize');
        $product_id = (int) $request->input('product_id');
        if($qty<=0){
            Session::flash('error','Nhập số lượng không chính xác');
            return false;
        }
        elseif($product_id<=0){
            Session::flash('error','Sản phẩm đang gặp trục trặc');
            return false;
        }
        elseif($size==null){
            Session::flash('error','Chọn kích thước sản phẩm đang gặp trục trặc');
            return false;
        }
        $carts = Session::get('carts'); // lấy giá trị giỏ hàng được lưu trong session
        if(is_null($carts)){
            Session::put('carts',[
                $product_id=> [
                    'quantity'=>$qty,
                    'size'=>$size
                ],
            ]);
            return true;
        }
        $exists = Arr::exists($carts,$product_id);
        if($exists){
            // $totalqty = $carts[$product_id.'quantity']+ $qty; cách để lấy một giá trị trong key của mảng
            $carts[$product_id]['quantity']=$qty;
            $carts[$product_id]['size']=$size;
            Session::put('carts',$carts);
            return true;
        }
        $carts[$product_id]['quantity']=$qty;
        $carts[$product_id]['size']=$size;
        Session::put('carts',$carts);
        return true;
    }
    public function getProducts(){
        $carts = Session::get('carts');
        if(is_null($carts)){
            return [];
        }
        $products_id = array_keys($carts);// lấy giá  trị key trông laravel
        Return Product ::select('id','name','price','price_sale','thumb')
        ->where('active',1)
        ->whereIn('id',$products_id) // whereIn dùng để lấy các giá trị có trong mảng cụ thể tại đây là mảng product_id
        ->get();

    }
    public function update($request){
        Session::put('carts',$request->input('carts_product'));
        return true;
    }
    public function remove($id){
        $carts = Session::get('carts');
        unset($carts[$id]); // xóa sản phẩm trong ngoặc
        Session::put('carts',$carts);
    }
    public function examCustomer(){
        $customer = Customer::select('name','address','phonenumber')->where('user_id',Auth::id())->first();
        if(is_null($customer)){
            return false;
        }
        else{
            if(is_null($customer->name)){
                return false;
            }
            if(is_null($customer->address)){
                return false;
            }
            if(is_null($customer->phonenumber)){
                return false;
            }
            return true;
        }
    }
    public function buyCart(){
        try {
            DB::beginTransaction();
            if($this->examCustomer()){
              // trong quá trình chạy bị lỗi thì rollback lại không thì commit
                $carts = Session::get('carts');
                $customer = Customer::select('id','name','address','phonenumber')->where('user_id',Auth::id())->first();
                if(is_null($carts)){
                    return false;
                }
                $this->infoProduct($carts,$customer->id);
                #queue
                #create php artisan queue:table
                #create php artisan migrate
                #chỉnh sửa file env,
                # lưu lại khi chỉnh sửa file env bằng cách:composer dump-autoload
                #thục thi jobs bằng cách : php artisan que:work
                $email=Auth::user()->email;
                SendMail::dispatch($email)->delay(now()->addSeconds(2));
                DB::commit();
                Session::flash('success','Đặt hàng thành công');
                Session::forget('carts');
                return true;
            }
            else
            {
                DB::rollBack();
                Session::flash('error','Đặt hàng bị lỗi do không tìm thấy thông tin người dùng');
                return false;
            }
        } catch (Exception $e) {
            Session::flash('error',$e->getMessage());

            return false;
        }
    }
    public function infoProduct($carts,$customer_id){
        $products_id = array_keys($carts);

        $products = Product ::select('id','name','price','price_sale','thumb')
        ->where('active',1)
        ->whereIn('id',$products_id) // whereIn dùng để lấy các giá trị có trong mảng cụ thể tại đây là mảng product_id
        ->get();
        $data = [];

        foreach($products as $product){
            if($carts[$product->id]['size']=="M"){
                $pris = 1.2;
                if(is_null($product->price_sale)){
                    $pricetotal =  $product->price*$pris*$carts[$product->id]['quantity'];
                }
                else{
                    $pricetotal =  $product->price_sale*$pris*$carts[$product->id]['quantity'];
                }
            }
            else{
                $pris = 1;
                if(is_null($product->price_sale)){
                    $pricetotal =  $product->price*$pris;
                }
                else{
                    $pricetotal =  $product->price_sale*$pris;
                }
            }

            $data[]=[
                'product_id' => $product->id,
                'customer_id' => $customer_id,
                'size' =>  $carts[$product->id]['size'],
                'quantity' => $carts[$product->id]['quantity'],
                'pricetotal' => $pricetotal,
            ];

        }
        return Cart::insert($data);
    }
    public function updateprofile($request){

        try{    Customer::select('name','address','phonenumber','content')->where('user_id',Auth::id())->update([
                'name'=> (string) $request->input('name'),
                'address' => (string) $request->input('address'),
                'phonenumber' =>  (int) $request->input('phonenumber'),
                'content' => (string) $request->input('content')
                 ]);
            // $customer = Customer::select('name','address','phonenumber','content')->where('user_id',Auth::id())->first();
            // $customer->name = (string) $request->input('name');
            // $customer->address = (string) $request->input('address');
            // $customer->content = (string) $request->input('content');
            // $customer->phonenumber = (string) $request->input('phonenumber');
            // $customer->save();
            Session::flash('success','Chỉnh sửa thông tin thành công');
            return true;
        }
        catch(Exception $e){
            Session::flash('error',$e->getMessage());
            return false;
        }

    }
    public function getprofile(){
        return Customer::select('name','address','phonenumber','content')->where('user_id',Auth::id())->first();
        // return thông tin khách hàng thêm mỗi khi thêm
    }
    public function getproductCart(){
        $customers = Customer::join('carts','customers.id','=','carts.customer_id')
        ->join('products','carts.product_id','=','products.id')
        ->select('customers.name','customers.address','customers.phonenumber','carts.id as cart_id','customers.content','products.name as product_name','products.price','products.price_sale','products.thumb','carts.size','carts.quantity','carts.pricetotal','carts.active')
        ->where('customers.user_id',Auth::id())
        ->where('products.active',1)
        ->get();
        return $customers ;
    }
    public function getCarts(){
        $customer = Customer::select('id','name','address','phonenumber','content')->where('user_id',Auth::id())->first();
        return Cart::select('product_id','size','quantity','pricetotal','active')->where('customer_id',$customer->id)->get();
        // lấy thông tin giỏ hàng của khách hàng
    }
    public function destroy($id) {
        // kiểm tra có trong where hay không
        $cart = Cart::where('id',$id)->first();
        if($cart){
            return Cart::where('id',$id)->delete();
        }
        return false;
    }
}
