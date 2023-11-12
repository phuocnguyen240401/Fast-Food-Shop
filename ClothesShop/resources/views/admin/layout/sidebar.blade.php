<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('storage/images/LogoMini.png') }}" alt="Logo" width="100px"/>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{-- active has-sub --}}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-table"></i>Danh Mục</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ asset('admin/menus/add') }}">Thêm danh mục</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/menus/list') }}">Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>

                <li class="{{-- active has-sub --}}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-cart-plus"></i>Sản Phẩm</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ asset('admin/products/add') }}">Thêm sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/products/list') }}">Danh sách sản phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="{{-- active has-sub --}}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-picture-o"></i>Slider Quảng Bá</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ asset('admin/sliders/add') }}">Thêm slider</a>
                        </li>
                        <li>
                            <a href="{{ asset('admin/sliders/list') }}">Danh sách slider</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
