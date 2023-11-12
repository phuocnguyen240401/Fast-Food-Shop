<?php
namespace App\Helpers;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
// Tạo file Helper để tử động cập nhật danh sách danh mục
// Để có thể dùng nhiều lần, ta có thể sử dụng autoLoad.được tìm thấy tại composer.json
// Update composer.json :composer dump-autoload
class Helper{

    public static function examlogin(){
        $html = '';
        if(Session::has('examlogin')){
            $html .='
                <ul class="mysub-nav">
                    <li><a href="/profile">Thông tin tài khoản</a></li>
                    <li><a href="/users/logout">Đăng xuất</a></li>
                </ul>';
            return $html;
        }
        else{
            $html .='<ul class="mysub-nav">
            <li><a href="/admin/users/login">Đăng nhập</a></li>
            </ul>
            ';
            return $html;
        }

    }
    public static function examcart(){
        $html = '';
        if(Session::has('examlogin')){
            $html .='
                <ul class="mysub-nav mysub-nav-cart">
                    <li><a href="/carts">Giỏ hàng</a></li>
                    <li><a href="/targetcart">Theo dõi đơn hàng</a></li>
                </ul>';
            return $html;
        }
        else{
            $html .='<ul class="mysub-nav mysub-nav-cart">
            <li><a href="/carts">Giỏ hàng</a></li>
            </ul>
            ';
            return $html;
        }
    }
    public static function menu($menus,$parent_id=0,$char=''){
        $html='';
        foreach ($menus as $key=>$menu){// $key= là từ khóa ,$ menu là giá trị từ khóa biểu thị
            if($parent_id==0)
                    {
                        $char='';
                    }
            else{
                $char='|-->';
                }
            if($menu->parent_id == $parent_id){
                // .= dùng để nối chuỗi
                $html .= '
                <tr>
                    <td>'.$menu->id.'</td>
                    <td>'.$char.$menu->name.'</td>
                    <td>'.$menu->description.'</td>
                    <td>'.$menu->updated_at.'</td>
                    <td>'.self::active($menu->active).'</td>
                    <td>
                    <div class="table-data-feature">
                        <a href="/admin/menus/edit/'.$menu->id.'" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>

                        <a href="#" onclick="removeRow('.$menu->id.',\'destroy/\',)"class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                    </div>
                </td>
                </tr>
                ';
                if($parent_id==0)
                    {
                        $char='';
                    }
                else{
                    $char='|-->';
                    }
                $html.= self::menu($menus,$menu->id,$char);
                unset($menus[$key]); // Dùng để xóa giá trị của $key hiện tại và cộng thêm các phần tử con của nó, cập nhật giá trị cho mảng

            }


        }

        return $html;

        // try{

        // } catch(Exception $e) {
        //     Session::flash('error',$e->getMessage());
        //     return false;
        // };


    }
    public static function active($active = 0){
        return $active == 0 ? 'No':'Yes';
    }

    public static function activeCarts($active = 0){
        return $active == 0 ? 'Đang giao':'Đã giao';
    }
    public static function menus($menus,$parent_id=0){
        $html= '';
        foreach($menus as $key=>$menu){
            if($menu->parent_id==$parent_id){
                $html.='<li class="menu-item';
                if(self::isChild($menus,$menu->id)){
                    $isChild= true;
                    $html.='has-sub';
                }
                else{
                    $isChild= false;
                }
                $html.='">';
                           $html.=
                           ' <a class="item-anchor" href="/danh-muc/'.$menu->id.'-'.Str::slug($menu->name,'-').'.html">
                                '.$menu->name;
                            if($isChild){
                                $html.= '<i class="icon icon-chevron-down"></i>';
                            }
                            $html.='</a>';
                            unset($menus[$key]);
                            if(self::isChild($menus,$menu->id)){
                                $html.='<ul class="submenu">';
                                $html.=self::menus($menus,$menu->id);
                                $html.='</ul>';
                            }
                $html.='</li>';

            }
        }
        return $html;
    }
    public static function menutop($menustop){
        $html='';
        foreach($menustop as $key=>$menu){
            if($key==0){
                $html.= '<div class="col-lg-7 col-md-12 left-content">
                <div class="collection-item">
                  <div class="products-thumb">
                    <img src="'.$menu->thumb.'" alt="collection item" class="large-image image-rounded">
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 product-entry">';
            }
            else{
                $html.= '<div class="col-lg-5 col-md-12 right-content flex-wrap">
                <div class="collection-item top-item">
                  <div class="products-thumb">
                    <img src="'.$menu->thumb.'" alt="collection item" class="small-image image-rounded">
                  </div>
                  <div class="col-md-6 product-entry">';
            }
            $html.='
            <h3 class="item-title">'.$menu->name.'</h3>
            <p>'.$menu->description.'</p>
            <div class="btn-wrap">
              <a href="/danh-muc/'.$menu->id.'-'.Str::slug($menu->name,'-').'.html" class="d-flex align-items-center">shop collection <i class="icon icon-arrow-io"></i>
              </a>
            </div>';
            if($key==0){
                $html.= '</div>
                </div>
              </div>';
            }
            else{
                $html.='</div>
                </div></div>';

            }
        }
        $html.= '</div>';
        return $html;
    }
    public static function isChild($menus,$id){
        foreach($menus as $key=>$menu){
            if($menu->parent_id == $id){
                return true;
            }
        }
        return false;
    }
    public static function price($price=0,$price_sale=0){
        if($price!=0 and $price_sale!=0){
            return '<span class="item-price text-danger text-decoration-line-through">'.number_format($price).'đ</span><span>&ensp;</span><span class="item-price text-primary">'.number_format($price_sale).'đ</span>';
        }
        if($price!=0 and ($price_sale == null or $price_sale==0) ){
            return '<span class="item-price text-primary">'.number_format($price).'đ</span>';
        }
        else{
            return '<span class="item-price text-primary"><a href="/lien-he.html">Sắp ra mắt</a></span>';
        };
    }
    public static function menusbrand($menulist){
        $html= '';
        foreach($menulist as $key=>$menu){
            if($menu->parent_id ==0){
                $html.='<section class="site-banner jarallax min-height300 padding-large" style="background: url('.$menu->thumb.') no-repeat; background-position: top;">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1 class="page-title">'.$menu->name.'</h1>
                      <div class="breadcrumbs">
                        <span class="item">
                          <a href="/">Home/</a>
                        </span>
                        <span class="item">'.$menu->name.'</span>
                      </div>
                    </div>
                  </div>
                </div>
              </section>';
            }
            if($menu->parent_id!= 0){
                $html= '';
                $html.='<section class="site-banner jarallax min-height300 padding-large" style="background: url('.$menu->thumb.') no-repeat; background-position: top;">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h1 class="page-title">'.$menu->name.'</h1>
                      <div class="breadcrumbs">
                        <span class="item">
                          <a href="/">Home/</a>
                        </span>
                        <span class="item">'.$menu->name.'</span>
                      </div>
                    </div>
                  </div>
                </div>
              </section>';
            }

        }
        return $html;
    }
}
