<!DOCTYPE html>
<html class="no-js"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The AFN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <link rel="manifest" href="site.webmanifest">  --}}
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png">
    <!-- NewsViral CSS  -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/widgets.css">
    <link rel="stylesheet" href="/assets/css/color.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <meta property="fb:app_id" content="1107159879970524" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RNKSQ1Z57R"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RNKSQ1Z57R');
    </script>

    @yield('css')
</head>

<body>
    <!-- Preloader Start -->
    {{--  <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="jump mb-50" src="/assets/imgs/loading.svg" alt="">
                    <h6>Now Loading</h6>
                    <div class="loader">
                        <div class="bar bar1"></div>
                        <div class="bar bar2"></div>
                        <div class="bar bar3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>  --}}
    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        <aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
            <button class="off-canvas-close"><i class="ti-close"></i></button>
            <div class="sidebar-inner">
                <!--Search-->
                <div class="siderbar-widget mb-50 mt-30">
                    <form action="#" method="get" class="search-form position-relative">
                        <input type="text" class="search_field" placeholder="Search" value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                </div>
                <!--lastest post-->
                <div class="sidebar-widget mb-50">
                    <div class="widget-header mb-30">
                        <h5 class="widget-title">Top <span>Trending</span></h5>
                    </div>
                    <div class="post-aside-style-2">
                        <ul class="list-post">
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="/assets/imgs/thumbnail-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Vancouver woman finds pictures and videos of herself online</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">K. Marry</a></span>
                                            <span class="post-on">4m ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="/assets/imgs/thumbnail-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">4 Things Emotionally Intelligent People Don’t Do</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">Mr. John</a></span>
                                            <span class="post-on">3h ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="/assets/imgs/thumbnail-5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Reflections from a Token Black Friend</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">Kenedy</a></span>
                                            <span class="post-on">4h ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="/assets/imgs/thumbnail-7.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">How to Identify a Smart Person in 3 Minutes</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">Steven</a></span>
                                            <span class="post-on">5h ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="single.html">
                                            <img src="/assets/imgs/thumbnail-8.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="single.html">Blackface Minstrel Songs Don’t Belong in Children’s Music Class</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by">By <a href="author.html">J.Smith</a></span>
                                            <span class="post-on">5h30 ago</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Categories-->
                <div class="sidebar-widget widget_tag_cloud mb-50">
                    <div class="widget-header tags-close mb-20">
                        <h5 class="widget-title mt-5">Tags Cloud</h5>
                    </div>
                    <div class="tagcloud">
                        <a href="category.html">Beauty</a>
                        <a href="category.html">Book</a>
                        <a href="category.html">Design</a>
                        <a href="category.html">Fashion</a>
                        <a href="category.html">Lifestyle</a>
                        <a href="category.html">Travel</a>
                        <a href="category.html">Science</a>
                        <a href="category.html">Health</a>
                        <a href="category.html">Sports</a>
                        <a href="category.html">Arts</a>
                        <a href="category.html">Books</a>
                        <a href="category.html">Style</a>
                    </div>
                </div>
                <!--Ads-->
                <div class="sidebar-widget widget-ads mb-30">
                    <div class="widget-header tags-close mb-20">
                        <h5 class="widget-title mt-5">Your Ads Here</h5>
                    </div>
                    <a href="/assets/imgs/news-1.jpg" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                        <img class="border-radius-10" src="/assets/imgs/ads-1.jpg" alt="">
                    </a>
                </div>
            </div>
        </aside>
        <!-- Main Header -->
        @include('frontend.includes.header')
        <!-- Main Wrap Start -->
        <main class="position-relative">
            @yield('content')

        </main>
        <!-- Footer Start-->
        @include('frontend.includes.footer')
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/jquery.slicknav.js"></script>
    <script src="/assets/js/vendor/owl.carousel.min.js"></script>
    <script src="/assets/js/vendor/slick.min.js"></script>
    <script src="/assets/js/vendor/wow.min.js"></script>
    <script src="/assets/js/vendor/animated.headline.js"></script>
    <script src="/assets/js/vendor/jquery.magnific-popup.js"></script>
    <script src="/assets/js/vendor/jquery.ticker.js"></script>
    <script src="/assets/js/vendor/jquery.vticker-min.js"></script>
    <script src="/assets/js/vendor/jquery.scrollUp.min.js"></script>
    <script src="/assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="/assets/js/vendor/jquery.sticky.js"></script>
    <script src="/assets/js/vendor/perfect-scrollbar.js"></script>
    <script src="/assets/js/vendor/waypoints.min.js"></script>
    <script src="/assets/js/vendor/jquery.counterup.min.js"></script>
    <script src="/assets/js/vendor/jquery.theia.sticky.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- NewsViral JS -->
    <script src="/assets/js/main.js"></script>
</body>

</html>
