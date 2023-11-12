<?php
 
namespace App\View\Composers;
 
use App\Models\Menu;
use App\Repositories\UserRepository;
use Illuminate\View\View;
class MenuComposer
{
    public function __construct(

    ) {}
 
    public function compose(View $view)
    {
        // cần phải đăng kí tại thư mục app.php của config
         $menus = Menu::select('id','name','parent_id')->where('active',1)->orderByDesc('id')->get();
         return $view->with('menus', $menus);
    }
}