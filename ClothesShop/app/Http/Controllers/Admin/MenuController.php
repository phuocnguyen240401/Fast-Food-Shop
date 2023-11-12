<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menus\CreateFormRequest;
use App\Http\Requests\Menus\EditFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menus\MenusService;// thêm đường dẫn class MenusServices;
use Illuminate\Http\JsonResponse;
use App\Models\Menu;
class MenuController extends Controller
{
    protected $menuService; // tạo một biến khai báo cụ thể là khai báo thuộc tính menuservice thuộc thuộc tính được bảo vệ
    public function __construct(MenusService $menusService){// tạo biến menusService thuộc class MenuService
        $this->menuService= $menusService; // hàm contrust cho phép khởi tạo thuộc tính của một đối tượng. cụ thể trong này là thuộc tính menusService của đối tượng $menusService

    }
    public function create(){

        return view('admin.menus.add',[
            'title'=>'Thêm sản phẩm mới',
            'menus'=> $this->menuService->getParent(),
        ]);
    }
    public function store(CreateFormRequest $request){
        $this->menuService->create($request);// tại sao phải rồm rà như vậy. mà không làm thẳng luôn nhỉ ? nguyên nhân là để tách thành nhiều phần dễ quản lý và copy paste dùng lại nhiều lần
        // dd($request->input());
        return redirect()->back(); // quay lại trang đã add
    }
    public function index(){


        return view('admin.menus.list',[
            'title'=>'Danh sách danh mục',
            'menus'=>$this->menuService->getAll(),
        ]);
    }
    public function show(Menu $menu){
        return view('admin.menus.edit',[
            'title'=>'Sửa danh mục',
            'menu'=> $menu,
            'menus'=>$this->menuService->getParent(), // phòng trường hợp update cha
        ]);
    }
    public function update(Menu $menu,EditFormRequest $request){
        $this->menuService->update($menu,$request);
        return redirect('admin/menus/list');
    }
    public function destroy($menuId){
        $result = $this->menuService->destroy($menuId);
        if($result){
            return response()->json([
                'error'=> false,
                'message'=>'Xóa thành công danh mục'
            ]); // trả về một thằng view
        }
        else
        {
            return response()->json([
                'error'=> true,
            ]);
        }
    }

}
