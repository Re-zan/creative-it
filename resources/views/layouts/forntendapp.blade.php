<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="zLekeT5JkQ0k8FyDjuK0o29fevVI1bZPp8euSVO1">
    <meta name="description"
        content="Develop your professional &amp; personal skills through Creative IT Institute. We provide Graphic Design, Web &amp; Software, Digital Marketing, Networking, Film &amp; Media, Robotics &amp; Automation Training etc affordable price." />


    <title>Home - Chattogram Branch</title>
    <link href="https://creativeitinstitutectg.com/frontend/images/icon.jpg" rel="icon" />
    <link href="//fonts.googleapis.com/css?family=Arimo:400,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700,900&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/lightbox.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font/flaticon.css') }}">

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/media.css') }}" rel="stylesheet" />

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="70">


    <header id="header">
        <div class="container">
            <div class="row mx-0">
                <div class="col-lg-2 col-sm-3 px-0">
                    <div class="news-title">
                        <p>{{ $header->notice_title }}</p>

                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 px-0">
                    <div class="news-details">
                        <p class="marquee">
                            {{ $header->notice }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!--============== Navbar Part Goes Here ================-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/img/' . $header->logo) }}" alt="logo">
                <span style="font-family: 'Ubuntu Condensed', sans-serif; color: #666; font-weight: 400;"> &nbsp;|
                    Chattogram</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @foreach ($menu as $menudata)
                        <li class="nav-item">
                            <a class="nav-link {{ $menu->last()->id == $menudata->id ? 'seminar-click' : '' }} "
                                href="{{ $menudata->menu_link }}">{{ $menudata->menu_name }}</a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </nav>


    @yield('content')




    <footer class="py-md-5 py-4" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="conatct-left footer-logo text-center">
                        <img src="https://creativeitinstitutectg.com/storage/logo/logo_6055bd628a508.png" alt="logo">
                        <h4>{{ $footer->footer_tag_title }}</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 pt-sm-4 pt-md-0 offset-lg-1">
                    <div class="addres-main">
                        <div class="address">
                            <h3>Address</h3>
                            <p>{{ $footer->footer_text }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 pt-sm-4 pt-md-0">
                    <div class="contact-right">
                        <div class="address">
                            <h3>Contact</h3>
                            <h5>{{ $footer->footer_link_text }}</h5>
                            <p>{{ $footer->footer_contact_text }}
                            </p>


                        </div>
                        <div class="social">
                            <a href="{{ $footer->footer_fb_link }}" target="_blank"><i class="fa fa-facebook-f"
                                    aria-hidden="true"></i></a>
                            <a href="{{ $footer->footer_youtube_link }}" target="_blank"><i
                                    class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <a href="{{ $footer->footer_linkedIn_link }}" target="_blank"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                            <a href="{{ $footer->footer_insta_link }}" target="_blank"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--============== Copyright Part Goes Here ================-->
    <a href="#" class="back2"> <i class="fa fa-chevron-up" aria-hidden="true"></i> </a>
    <section id="footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footerbtm text-center">
                        <p>Copyright © 2020 Creative IT Institute Chattogram. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Messenger Chat plugin Code -->






    <script src="{{ asset('frontend/js/jquery-1.12.4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>





</body>

</html>
