<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="/">
                            <img class="logo-img d-inline" src="/images/logo_beta.png" alt="" style="height: 38px">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="/images/logo_beta.png" alt=""  style="height: 38px">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="/images/logo_beta.png" alt="" style="width: 100px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <!-- Main-menu -->
                    <div class="main-nav text-left float-lg-left float-md-right">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="#">Global Economy</a></li>
                            <li class="cat-item cat-item-3"><a href="#">Environment</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Religion</a></li>
                            <li class="cat-item cat-item-5"><a href="#">Fashion</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Terrorism</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Conflicts</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Scandals</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Executive</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Foreign policy</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Healthy Living</a></li>
                            <li class="cat-item cat-item-3"><a href="#">Medical Research</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Children’s Health</a></li>
                            <li class="cat-item cat-item-5"><a href="#">Around the World</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Ad Choices</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Mental Health</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Media Relations</a></li>
                        </ul>
                        <nav>
                            <ul class="main-menu d-none d-lg-inline">
                                <li>
                                    <a href="/"><span class="mr-15">
                                        <ion-icon name="home-outline"></ion-icon></span>Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('post.index') }}"><span class="mr-15">
                                        <ion-icon name="megaphone-outline"></ion-icon></span>News
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('video.index') }}"><span class="mr-15">
                                            <ion-icon name="film-outline"></ion-icon></span>Videos
                                    </a>
                                </li>
                                <li>
                                    <a href="/"><span class="mr-15">
                                            <ion-icon name="mail-unread-outline"></ion-icon></span>Contact
                                    </a>
                                </li>
                            </ul>
                            {{--  <div class="d-inline ml-50 tools-icon">
                                <a class="red-tooltip text-danger" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hot Topics">
                                    <ion-icon name="flame-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-primary" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trending">
                                    <ion-icon name="flash-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-success" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Notifications">
                                    <ion-icon name="notifications-outline"></ion-icon>
                                    <span class="notification bg-success">5</span>
                                </a>
                            </div>  --}}
                        </nav>
                    </div>
                    <!-- Search -->
                    <form action="#" method="get" class="search-form d-lg-inline float-right position-relative mr-30 d-none">
                        <input type="text" class="search_field" placeholder="Search" value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                    <!-- Off canvas -->
                    <div class="off-canvas-toggle-cover">
                        <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
                            <ion-icon name="grid-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
