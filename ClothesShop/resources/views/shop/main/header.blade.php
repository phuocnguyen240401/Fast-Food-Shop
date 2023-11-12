<div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  {{-- <div class="search-popup">
    <div class="search-popup-container">

      <form role="search" method="get" class="search-form" action="">
        <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
        <button type="submit" class="search-submit"><a href="#"><i class="icon icon-search"></i></a></button>
      </form>

      <h5 class="cat-list-title">Browse Categories</h5>

      <ul class="cat-list">
        <li class="cat-list-item">
          <a href="shop.html" title="Men Jackets">Men Jackets</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Fashion">Fashion</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Casual Wears">Casual Wears</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Women">Women</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Trending">Trending</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Hoodie">Hoodie</a>
        </li>
        <li class="cat-list-item">
          <a href="shop.html" title="Kids">Kids</a>
        </li>
      </ul>
    </div>
  </div> --}}
  <header id="header">
    <div id="header-wrap">
      <nav class="secondary-nav border-bottom">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-4 header-contact">
            </div>
            <div class="col-md-4 shipping-purchase text-center">
            </div>
            <div class="col-md-4 col-sm-12 user-items">
              <ul class="mymain-nav d-flex justify-content-end list-unstyled">
                <li>
                    <a href="#"><i class="icon icon-user"></i></a>
                    {!! Helper::examlogin() !!}
                </li>
                <li>
                    <a href="#"><i class="icon icon-shopping-cart"></i></a>
                    {!! Helper::examcart() !!}
                </li>
                {{-- <li>
                  <a href="wishlist.html">
                    <i class="icon icon-heart"></i>
                  </a>
                </li>
                <li class="user-items search-item pe-3">
                  <a href="#" class="search-button">
                    <i class="icon icon-search"></i>
                  </a>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <nav class="primary-nav padding-small">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-lg-2 col-md-2">
              <div class="main-logo">
                <a href="/">
                  <img src="/templates/shop/images/main-logo.png" alt="logo">
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-md-10">
              <div class="navbar">

                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                  <ul class="menu-list">
                    <li class="menu-item has-sub">
                      <a href="/" class="item-anchor active d-flex align-item-center">Home</a>
                      {{-- <ul class="submenu">
                        <li><a href="index.html" class="item-anchor active">Home</a></li>
                        <li><a href="home2.html" class="item-anchor">Home v2<span class="text-primary"> (PRO)</span></a></li>
                      </ul> --}}
                    </li>
                    {!! Helper::menus($menus) !!}
                    <li><a href="contact.html" class="item-anchor" >Liên hệ</a></li>
                  </ul>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
