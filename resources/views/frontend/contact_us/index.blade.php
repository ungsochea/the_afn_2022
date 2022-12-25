@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="entry-header entry-header-2 mb-50 mt-50 text-center">
        <div class="thumb-overlay img-hover-slide border-radius-5 position-relative" style="background-image: url(assets/imgs/news-24.jpg)">
            <div class="position-midded">
                <div class="entry-meta meta-0 font-small mb-30">
                    <a href="category.html"><span class="post-cat bg-success color-white">Get In Touch</span></a>
                </div>
                <h1 class="post-title mb-30 text-white">
                    Contact Us
                </h1>
                <div class="entry-meta meta-1 font-x-small color-grey text-uppercase text-white">
                    <span class="mr-5">
                        <ion-icon name="planet"></ion-icon>
                    </span>
                    <span class="mr-15">the-afn.com</span>
                    <span class="ml-15 mr-5">
                        <ion-icon name="call"></ion-icon>
                    </span>
                    <span>(+855) 99 666 432</span>
                </div>
            </div>
        </div>
    </div>
    <!--end entry header-->
    <div class="row mb-50">
        <div class="col-lg-2 d-none d-lg-block"></div>
        <div class="col-lg-8 col-md-12">
            <div class="single-social-share single-sidebar-share mt-30">
                <ul>
                    <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="https://www.facebook.com/ASEANFootballNews"><i class="ti-facebook"></i></a></li>
                    <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="https://twitter.com/theafndotcom"><i class="ti-twitter-alt"></i></a></li>
                    <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="https://www.instagram.com/aseanfootballnews"><i class="ti-instagram"></i></a></li>
                    <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="https://t.me/aseanfootballnews"><i class="ti-tumblr"></i></a></li>
                    {{-- <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li> --}}
                    <li><a class="social-icon email-icon text-xs-center" target="_blank" href="mailto:info@the-afn.com"><i class="ti-email"></i></a></li>
                </ul>
            </div>
            <div class="single-excerpt">
                <p class="font-large">ASEAN Football News was established in 2017 and aimed to promote football in the Association of South East Asia to the people of this community as well as to people around the world. It was founded because football in ASEAN has become the most popular sport, and every member of the ASEAN is striving to improve their grassroots and young talents in challenging each other.</p>
                <hr class="wp-block-separator is-style-wide">
                <p><span class="mr-5">
                        <ion-icon name="location-outline"></ion-icon>
                    </span><strong>Address</strong>: Phnom Penh, CAMBODIA</p>
                <p><span class="mr-5">
                        <ion-icon name="home-outline"></ion-icon>
                    </span><strong>Our website</strong>: https://the-afn.com</p>
                <p><span class="mr-5">
                        <ion-icon name="planet-outline"></ion-icon>
                    </span><strong>Support center</strong>: info@the-afn.com</p>
            </div>
            <div class="entry-main-content mt-50">
                <h3>Looking for Content Contributors</h3>
                <hr class="wp-block-separator is-style-wide">
                <p>Due to limited financial resources, we cannot explore every angle of football news from each member of the ASEAN. We believe that a good way to promote footballers, as well as the development of football in every member, those who love football and are keen on writing in English, can share the article with us. We trust that your article could play a crucial part in developing football in our ASEAN community.
                    For further information, please send it to info@the-afn.com </p>
                <h1 class="mt-30">Get in touch</h1>
                <hr class="wp-block-separator is-style-wide">
                <form class="form-contact comment_form" id="contact-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="phone" id="phone" type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="description" id="description" cols="30" rows="9" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="btnSubmit" class="button button-contactForm">Send message</button>
                    </div>
                    <div id='msg'></div>
                    {{-- <div class="alert alert-success" role="alert"></div>
                        This is a danger alert—check it out!
                    </div> --}}
                    {{-- <p class="text-success"></p> --}}
                </form>
            </div>
            {{-- <div class="entry-bottom mt-50 mb-30">
                <div class="overflow-hidden mt-30">
                    <div class="single-social-share float-left">
                        <ul class="d-inline-block list-inline">
                            <li class="list-inline-item"><span class="font-small text-muted"><i class="ti-sharethis mr-5"></i>Share: </span></li>
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!--End row-->
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="#">
                <img class="d-inline border-radius-10" src="assets/imgs/ads.jpg" alt="">
            </a>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $(function(){$('#contact-form').trigger('reset');$('#msg').html('')});
    $('#btnSubmit').click(function(e){
        e.preventDefault();
        $("input").removeClass('is-invalid');
        $("textarea").removeClass('is-invalid');
        $('#msg').html('');
        $.ajax({
            data: $('#contact-form').serialize(),
            url: '/contact-us',
            type: "POST",
            dataType: 'json',
            beforeSend: function () {

                $("input[name=name]").prop( "disabled", true );
                $("input[name=email]").prop( "disabled", true );
                $("input[name=phone]").prop( "disabled", true );
                $("textarea[name=description]").prop( "disabled", true );

                $('#btnSubmit').prop( "disabled", true );
                $('#btnSubmit').html('loading...');

            },
            success: function (data) {
                setTimeout(function () {

                    $('#contact-form').trigger('reset');
                    $("input[name=name]").prop( "disabled", false );
                    $("input[name=email]").prop( "disabled", false );
                    $("input[name=phone]").prop( "disabled", false );
                    $("textarea[name=description]").prop( "disabled", false );

                    $('#btnSubmit').prop( "disabled", false );
                    $('#btnSubmit').html('Send message');
                    $('#msg').html('<div class="alert alert-success" role="alert">'+data.message+'</div>')

                }, 2000);

            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (key, item)
                {
                    $("input[name="+key+"]").addClass('is-invalid');
                    //$("p#"+key+"Error").html(item);
                });

                $("input[name=name]").prop( "disabled", false );
                $("input[name=email]").prop( "disabled", false );
                $("input[name=phone]").prop( "disabled", false );
                $("textarea[name=description]").prop( "disabled", false );

                $('#btnSubmit').prop( "disabled", false );
                $('#btnSubmit').html('Send message');
            }
        });
    })
    </script>
@endsection
