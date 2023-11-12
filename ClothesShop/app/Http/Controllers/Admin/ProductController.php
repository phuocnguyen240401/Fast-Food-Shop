<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Products\ProductsService;
use App\Http\Requests\Products\CreateFormRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $productService;
    // tạo một biến khai báo cụ thể là khai báo thuộc tính menuservice thuộc thuộc tính được bảo vệ
    public function __construct( ProductsService $productsService){// tạo biến menusService thuộc class MenuService
     // hàm contrust cho phép khởi tạo thuộc tính của một đối tượng. cụ thể trong này là thuộc tính menusService của đối tượng $menusService
        $this->productService = $productsService;
    }
    public function index()
    {
        //
        return view('admin.products.list',[
            'title'=>'Danh sách sản phẩm',
            'products'=>$this->productService->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('admin.products.add',[
            'title'=> 'Thêm Sản Phẩm',
            'menus'=> $this->productService->getMenu(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateFormRequest $request)
    {
        $this->productService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.edit',[
            'title'=> 'Chỉnh sửa sản phẩm',
            'product'=> $product,
            'menus'=> $this->productService->getMenu(),
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Product $product)
    {$result =$this->productService->update($request, $product);
        if($result){
            return redirect('admin/products/list');
        }
        else{
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId){
        $result =$this->productService->delete($productId);
        if($result){
            return response()->json([
                'error'=> false,
                'message'=> 'Xóa sản phâm thành công',

            ]);

        }
        else{
            return response()->json([
                'error'=> true,
            ]);
        }
    }

}
