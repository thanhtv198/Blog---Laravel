<!-- BEGIN STYLE CUSTOMIZER -->
<div class="color-panel hidden-sm">
    <div class="color-mode-icons icon-color"></div>
    <div class="color-mode-icons icon-color-close"></div>
    <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
            <li class="color-red current color-default" data-style="red"></li>
            <li class="color-blue" data-style="blue"></li>
            <li class="color-green" data-style="green"></li>
            <li class="color-orange" data-style="orange"></li>
            <li class="color-gray" data-style="gray"></li>
            <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
    </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->

<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span>09339472473</span></li>
                    <li><i class="fa fa-envelope-o"></i><span>info@keenthemes.com</span></li>
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    <li><a href="{{ route('register') }}">Registration</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header" id="header-scroll">
    <div class="container">
        <a class="site-logo" href="{{ route('home') }}">
            <img src="{{ asset('source/frontend/theme/assets/frontend/layout/img/logos/logo-corp-red.png') }}">
        </a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
            <ul>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Home
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="index.html">Home Default</a></li>
                        <li><a href="index-header-fix.html">Home with Header Fixed</a></li>
                        <li><a href="index-without-topbar.html">Home without Top Bar</a></li>
                    </ul>
                </li>
                <li class="dropdown dropdown-megamenu">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Mega Menu

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="header-navigation-content">
                                <div class="row">
                                    <div class="col-md-4 header-navigation-col">
                                        <h4>Footwear</h4>
                                        <ul>
                                            <li><a href="index.html">Astro Trainers</a></li>
                                            <li><a href="index.html">Basketball Shoes</a></li>
                                            <li><a href="index.html">Boots</a></li>
                                            <li><a href="index.html">Canvas Shoes</a></li>
                                            <li><a href="index.html">Football Boots</a></li>
                                            <li><a href="index.html">Golf Shoes</a></li>
                                            <li><a href="index.html">Hi Tops</a></li>
                                            <li><a href="index.html">Indoor Trainers</a></li>
                                        </ul>
                                    </div>
                                 
                                    <div class="col-md-4 header-navigation-col">
                                        <h4>Accessories</h4>
                                        <ul>
                                            <li><a href="index.html">Belts</a></li>
                                            <li><a href="index.html">Caps</a></li>
                                            <li><a href="index.html">Gloves</a></li>
                                        </ul>

                                        <h4>Clearance</h4>
                                        <ul>
                                            <li><a href="index.html">Jackets</a></li>
                                            <li><a href="index.html">Bottoms</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Pages

                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="page-about.html">About Us</a></li>
                        <li><a href="page-services.html">Services</a></li>
                        <li><a href="page-prices.html">Prices</a></li>
                      
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Features

                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="feature-typography.html">Typography</a></li>
                        <li><a href="feature-buttons.html">Buttons</a></li>
                        <li><a href="feature-forms.html">Forms</a></li>

                        <li class="dropdown-submenu">
                            <a href="index.html">Multi level <i class="fa fa-angle-right"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.html">Second Level Link</a></li>
                                <li><a href="index.html">Second Level Link</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                                        Second Level Link
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="index.html">Third Level Link</a></li>
                                        <li><a href="index.html">Third Level Link</a></li>
                                        <li><a href="index.html">Third Level Link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Portfolio

                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="portfolio-4.html">Portfolio 4</a></li>
                
                    </ul>
                </li>
                <li class="dropdown active">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                        Blog

                    </a>

                    <ul class="dropdown-menu">
                        <li class="active"><a href="blog.html">Blog Page</a></li>
                        <li><a href="blog-item.html">Blog Item</a></li>
                    </ul>
                </li>
                <li><a href="shop-index.html" target="_blank">E-Commerce</a></li>
                <li><a href="onepage-index.html" target="_blank">One Page</a></li>
                <li><a href="http://keenthemes.com/preview/metronic/theme/templates/admin" target="_blank">Admin theme</a></li>

                <!-- BEGIN TOP SEARCH -->
                <li class="menu-search">
                    <span class="sep"></span>
                    <i class="fa fa-search search-btn"></i>
                    <div class="search-box">
                            {!! Form::open(['route' => 'search.post', 'method' => 'post']) !!}
                            <div class="input-group">
                                {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => trans('en.form.search')]) !!}
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                        trans('en.form.search')
                                </button>
                            </span>
                            </div>
                        {{ Form::close() }}}
                    </div>
                </li>
                <!-- END TOP SEARCH -->
            </ul>
        </div>
        <!-- END NAVIGATION -->
    </div>
</div>
<!-- Header END -->
<style>
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

</style>
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("header-scroll");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>