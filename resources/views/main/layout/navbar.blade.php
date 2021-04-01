<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@lang("Zajel")</title>
    <!-- Favicon -->
    <link rel="icon" href="/main/img/core-img/LOGO.png">

    <script src="/main/js/jquery/jquery-2.2.4.min.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/main/style.css">
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">


</head>

<body>
<!-- Preloader -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12"  >
            <div class="top-contact-info d-flex align-items-center">
                <div class="news red">
                    <span><i class="fas fa-bolt"></i> </span>
                    <ul>
                        @foreach($posts as $post)
                        <li><a style="color: #1B93D4;" >
                               {{$post->body}}
                            </a>
                        </li>
                            @endforeach

                    </ul>
                </div>
            </div>

        </div>

    </div></div>
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Top Header Area -->


    <!-- Navbar Area -->
    <div class="credit-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="creditNav">

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/">@lang("home")</a></li>
                                <li><a href="#">   @lang("lines") </a>
                                    <div class="megamenu">

                                        @foreach($lines as $line)

                                            <ul class="single-mega cn-col-4">
                                                <li>
                                                    <a href= "{{ URL::to('lines/'.$line->id.'') }}" >
                                                        {{$line->name}}
                                                    </a>
                                                </li>

                                            </ul>
                                        @endforeach


                                    </div>
                                </li>
                                <li><a href="#">     @lang("jornies")   </a>
                                    <ul class="dropdown">
                                        @foreach ($journeis as $journy)
                                             <a href= "{{ URL::to('journeis/'.$journy->id.'') }}" >
                                        <li style="text-align: center; color: #1B93D4;font-size: 18px!important; "> {{$journy->name}} </li></a>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="/services">@lang("services")</a></li>
                                <li><a href="aboutus">@lang("about us")</a></li>

                                <li><a href="/work"> @lang("Work with Us")</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>

                    <!-- Contact -->
                    <div class="contact" style=" font-size: 26px!important;
    line-height: 55px!important;">

                        <a href="#" style=" font-size: 26px!important;
    line-height: 55px!important;"> <i  class="fab fa-youtube"></i>  </a>
                        <a href="#" style=" font-size: 26px!important;
    line-height: 55px!important;"><i class="fab fa-whatsapp"></i>  </a>
                        <a href="#" style=" font-size: 26px!important;
    line-height: 55px!important;"> <i class="fab fa-telegram"></i>  </a>
                        <a href="#" style=" font-size: 26px!important;
    line-height: 55px!important;"> <i class="fab fa-facebook-f"></i>  </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

 @yield('header')

        <!-- Small boxes (Stat box) -->
    @yield('content')


<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100-0">
    <div class="container">
        <div class="row">

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget mb-100">
                    <h4 class="widget-title">@lang("home")</h4>
                    <hr>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="/">@lang("home")</a></li>
                            <li><a href="aboutus">@lang("About Us")</a></li>
                            <li><a href="services">@lang("Services")</a></li>
                            <li><a href="workUp">@lang("Work with Us")</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget mb-100">
                    <h4 class="widget-title">@lang("lines")</h5>
                    <hr>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            @foreach($linefooter as $lfoot)
                            <li><a href= "{{ URL::to('lines/'.$lfoot->id.'') }}">{{$lfoot->name}}</a></li>
                                @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Single Footer Widget -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-footer-widget mb-100">
                    <h4 class="widget-title">@lang("Journies")</h4>
                        <hr>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            @foreach($journeisfooter as $jfooter)
                                <li><a href= "{{ URL::to('journeis/'.$jfooter->id.'') }}">{{$jfooter->name}}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>

<hr>
            <div style="text-align: center!important; padding-right: 40%!important;size: 22px!important; color: white">
                <strong>
                @lang("All rights reserved.")
                    &copy; @lang("zajel")
 _
                   <a  style="color: white" href="/">@lang("kayali")</a>  </strong>

            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->
<style>


    @media only screen and (max-width: 767px) {
        .news span {
            width: 5%!important;
            font-size: 12px!important;
        }
        .news ul
        {
            padding-right: 5%!important;
            font-size: 12px!important;
        }

        .news a{

            font-size: 12px!important;
        }
    }


    .news {

        width: 100%;
        overflow: hidden;
        -webkit-user-select: none
    }

    .news span {
        float: right;
        color: #1B93D4;
        position: relative;

        padding-bottom: 15px!important;
        font-size: 20px;
        -webkit-font-smoothing: antialiased;
        -webkit-user-select: none;
        cursor: pointer
    }

    .news ul {
        float: right;
        padding-right: 20px;
        animation:ticker 50s linear infinite;
        -webkit-user-select: none
    }
    .news{
        padding-top: 15px!important;
        height: 50px!important;
    }
    .news ul li {
        line-height: 30px!important;
        padding-top: 5px!important;
        padding-bottom: 5px!important;
        list-style: none }

    .news ul li a {
        color: #1B93D4;
        text-decoration: none;
        font-size: 18px;
        -webkit-font-smoothing: antialiased;
        -webkit-user-select: none
    }

    .news ul:hover { animation-play-state: paused }
    .news span:hover+ul { animation-play-state: paused }

    @keyframes ticker {
        0%   {margin-top: 0px}
        10%  {margin-top: -40px}
        20%  {margin-top: -80px}
        30%  {margin-top: -120px}
        40%  {margin-top: -160px}
        50%  {margin-top: -200px}
        60%  {margin-top: -240px}
        70%  {margin-top: -280px}
        80%  {margin-top: -320px}
        90%  {margin-top: -360px}
        100% {margin-top: 0px}
    }
</style>
<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<!-- Popper js -->
<script src="/main/js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="/main/js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="/main/js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="/main/js/active.js"></script>
<script src="/main/js/jquery.newsticker.min.js"></script>

</body>

</html>
