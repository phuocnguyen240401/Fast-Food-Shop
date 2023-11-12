<?php


use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Product\ProductDetailController;
use App\Http\Controllers\Shop\MainController;
use App\Http\Controllers\Shop\MenuShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Theser
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::get('/admin/users/register',[RegisterController::class,'index'])->name('register');
Route::get('/users/logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
Route::post('/admin/users/login/store',[LoginController::class,'store']);
Route::post('/admin/users/register',[RegisterController::class,'store']);
Route::middleware(['admin_auth'])->group(function () {// thêm các group trong middleware để kiểm tra có login hay chưa
    Route::prefix('admin')->group(function(){// thêm tiền tố phía sau cụ thể là 'admin'
        Route::get('/',[AdminController::class,'index'])->name('admin'); // chỉ có thể trỏ tới route được đặt tên\
        Route::get('main',[AdminController::class,'index']);
        #menu
        Route::prefix('menus')->group(function () {
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::delete('destroy/{menuId}',[MenuController::class,'destroy']);

        });
        #products
        // Route::resource('products',ProductController::class);
        Route::prefix('products')->group(function(){

            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::delete('destroy/{productId}',[ProductController::class,'destroy']);
        });
        #slider
        Route::prefix('sliders')->group(function () {
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::delete('destroy/{sliderId}',[SliderController::class,'destroy']);
        });
        #upload
        Route::prefix('upload')->group(function(){
            Route::post('services',[UploadController::class,'store']);

        });

    });

});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile',[ProfileController::class,'index']);
    Route::get('/targetcart',[CartController::class,'targetcart']);
    Route::get('/targetcart/delete/{id}',[CartController::class,'destroy']);
});
Route::get('/',[MainController::class,'index'])->name('home');
// Route::get('/products',[ProductsShopController::class,'index']);
Route::post('/services/load-product',[MainController::class,'loadProduct']);
Route::get('/danh-muc/{id}-{slug}.html',[MenuShopController::class,'index']);
Route::get('/san-pham/{id}-{slug}.html',[ProductDetailController::class,'show']);
Route::post('/add-cart',[CartController::class,'index']);
Route::get('/carts',[CartController::class,'show']);
Route::get('/carts/delete/{id}',[CartController::class,'remove']);
Route::post('/update-cart',[CartController::class,'update']);
Route::post('/buy-cart',[CartController::class,'buycart']);
Route::post('/uploadprofile',[ProfileController::class,'updateprofile']);

