<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>Newshub | News & Blog HTML Template</title>

    <link rel="stylesheet" href="{{ asset('assets/newshub/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/jplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newshub/css/responsive.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Signika+Negative" rel="stylesheet">

    <link rel="icon" href="{{ asset('assets/newshub/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/newshub/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/newshub/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/newshub/images/ico/apple-touch-icon-72-precomposed.html') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/newshub/images/ico/apple-touch-icon-57-precomposed.png') }}">


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .about-page .breadcrumb-content {
            background-image: url("{{ asset('assets/common/img/covers/laravel-vue-cover.png') }}") !important;
        }

        .navbar-brand img {
            height: 23px;
            width: 159px;
        }
    </style>

</head>

<body class="about-page tr-page">
    <div class="main-wrapper tr-page-top">
        <div class="container-fluid">
            <div class="tr-topbar clearfix margin-bottom-0">
                <div class="row">
                    <div class="col-lg-3">
                        <a class="navbar-brand d-none d-lg-block" href="index-2.html"><img class="img-fluid" src="{{ asset('assets/newshub/images/logo.png') }}" alt="Logo"></a>
                    </div>
                    <div class="col-lg-9">
                        <div class="topbar-left">
                            <div class="breaking-news">
                                <span># Newsfeed</span>
                                <div id="ticker">
                                    <ul>
                                        <li><a href="#">Remarkable Women - character design project</a></li>
                                        <li><a href="#">Remarkable Women - character design project</a></li>
                                        <li><a href="#">Remarkable Women - character design project</a></li>
                                        <li><a href="#">Remarkable Women - character design project</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="topbar-right">

                            <!-- User DropDown -->
                            @if(Auth::check())
                            <div class="user">
                                <div class="user-image">
                                    <img class="img-fluid img-circle" src="{{ asset('assets/newshub/images/others/user.png') }}" alt="Image">
                                </div>
                                <div class="dropdown user-dropdown">
                                    Hello,
                                    <a href="#" aria-expanded="true">Jhon Player<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                    <ul class="sub-menu text-left">
                                        <li><a href="#">My Profile</a></li>
                                        <li><a href="#">Settings</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('newshub-logout-form').submit();">Log Out</a>
                                            <form id="newshub-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <div class="searchNlogin">
                                <ul>
                                    <li class="search-icon"><i class="fa fa-search"></i></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
                                    <li class="dropdown language-dropdown">
                                        <a href="#" aria-expanded="true"><span class="change-text">En</span> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="sub-menu text-center">
                                            <li><a href="#">EN</a></li>
                                            <li><a href="#">FR</a></li>
                                            <li><a href="#">GR</a></li>
                                            <li><a href="#">ES</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="search">
                                    <form role="form">
                                        <input type="text" class="search-form" autocomplete="off" placeholder="Type & Press Enter">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tr-menu menu-responsive">
                <nav class="navbar navbar-default navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
                    </button>
                    <a class="navbar-brand d-lg-none" href="index-2.html"><img class="img-fluid" src="{{ asset('assets/newshub/images/logo.png') }}" alt="Logo"></a>
                    <div class="collapse navbar-left navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav">
                            <li class="dropdown menu-item-icon"><a href="#"><i class="fa fa-bars"></i></a>
                                <ul class="sub-menu" role="menu">
                                    <li><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Dummy Menu</a>
                                    </li>
                                    <li class="dropdown"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Dummy
                                            Menu</a>
                                        <ul class="sub-menu-2" role="menu">
                                            <li><a href="#">Sub Dummy Menu</a></li>
                                            <li><a href="#">Sub Dummy Menu</a></li>
                                            <li><a href="#">Sub Dummy Menu</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>Dummy
                                            Menu</a>
                                        <ul class="sub-menu-2" role="menu">
                                            <li><a href="blog-four.html"><i class="fa fa-file-text" aria-hidden="true"></i>Sub
                                                    Dummy Menu</a></li>
                                            <li><a href="blog-five.html"><i class="fa fa-file-text" aria-hidden="true"></i>Sub
                                                    Dummy Menu</a></li>
                                            <li><a href="blog-six.html"><i class="fa fa-file-text" aria-hidden="true"></i>Sub
                                                    Dummy Menu</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index-2.html">Home Default</a></li>
                                    <li><a href="index1.html">Home Version-1</a></li>
                                    <li><a href="index2.html">Home Version-2</a></li>
                                    <li><a href="index3.html">Home Version-3</a></li>
                                    <li><a href="index4.html">Home Version-4</a></li>
                                    <li><a href="index5.html">Home Version-5</a></li>
                                </ul>
                            </li>
                            <li><a href="index2.html">Business</a></li>
                            <li><a href="index3.html">LifeStyle</a></li>
                            <li><a href="common-list.html">Politics</a></li>
                            <li><a href="index4.html">Sports</a></li>
                            <li><a href="index1.html">Social</a></li>
                            <li class="dropdown active"><a href="#">About</a>
                                <ul class="sub-menu">
                                    <li class="active"><a href="about.html">About Page</a></li>
                                    <li><a href="about1.html">About Page-1</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Details</a>
                                <ul class="sub-menu">
                                    <li><a href="details.html">Details Page</a></li>
                                    <li><a href="details1.html">Details Page-1</a></li>
                                    <li><a href="details2.html">Details Page-2</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Contact</a>
                                <ul class="sub-menu">
                                    <li><a href="contact.html">Contact Page</a></li>
                                    <li><a href="contact1.html">Contact Page-1</a></li>
                                </ul>
                            </li>
                            @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                            @endguest

                            <li><a href="404.html">404 Page</a></li>
                        </ul>
                    </div>
                    <ul class="feed pull-right">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul>
                </nav>
            </div>
            <div class="page-breadcrumb tr-section text-center">
                <div class="breadcrumb-content">
                    <div class="page-title">
                        <h1>Welcome To laravel Vue App V1</h1>
                    </div>
                    <p>We receive result combining marketing, a creative and industry experience.</p>
                </div>
            </div>
            <div class="tr-section tr-section-padding">
                <div class="tr-services">
                    <div class="container">
                        <div class="section-title">
                            <h1>Services</h1>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/1.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2><a href="#">Blogs</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/2.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2>E-Commerce</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/3.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2><a href="#">Tasks</a></h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/4.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2>Adv. & PR</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/5.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2>development</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="service">
                                    <div class="service-icon">
                                        <img src="{{ asset('assets/newshub/images/service/6.png') }}" alt="Image" class="img-fluid">
                                    </div>
                                    <h2>strategy</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tr-team-section text-center tr-section tr-section-padding">
                <div class="section-title">
                    <h1>Our Team</h1>
                </div>
                <div class="team-info">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                </div>
                <ul class="team-members">
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/1.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Leaf Corcoran</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/2.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Mike Lewis</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/3.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Julie MacKay</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/4.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Christine Marquardt</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/5.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Loren Heiman</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/6.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Chris Taylor</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/7.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Alex Posey</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/8.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Teddy Newell</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/9.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Eli Amesefe</h2>
                        </div>
                    </li>
                    <li>
                        <div class="team-member">
                            <div class="team-member-image">
                                <img src="{{ asset('assets/newshub/images/team/3.jpg') }}" alt="Team Member" class="img-fluid">
                                <div class="team-social">
                                    <ul class="social">
                                        <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h2>Andrei Patru</h2>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="footer-menu">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="widget widget-menu-2">
                            <h2>Category</h2>
                            <ul>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Politics</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">World</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Environment</a></li>
                                <li><a href="#">Health</a></li>
                                <li><a href="#">Entertainment</a></li>
                                <li><a href="#">Lifestyle</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget">
                            <h2>Editions</h2>
                            <ul>
                                <li><a href="#">United States</a></li>
                                <li><a href="#">China</a></li>
                                <li><a href="#">India</a></li>
                                <li><a href="#">Maxico</a></li>
                                <li><a href="#">Middle East</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="widget widget-menu-3">
                            <h2>Tag</h2>
                            <ul>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Featured</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Entertainment</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Tech</a></li>
                                <li><a href="#">Movies</a></li>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Packages</a></li>
                                <li><a href="#">Amazon</a></li>
                                <li><a href="#">Cars</a></li>
                                <li><a href="#">Phones</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="widget">
                            <h2>Products</h2>
                            <ul>
                                <li><a href="#">Ebooks</a></li>
                                <li><a href="#">Newsfeeds</a></li>
                                <li><a href="#">Reprints & Permissions</a></li>
                                <li><a href="#">Magazine</a></li>
                                <li><a href="#">College Guide</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="footer-logo">
                        <a href="index-2.html"><img class="img-fluid" src="{{ asset('assets/newshub/images/footer-logo.png') }}" alt="Logo"></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.</p>
                    <address>
                        <p>&copy; 2017 <a href="#">Newshub</a>. Email: <a href="#"><span class="__cf_email__" data-cfemail="e78e898188a7898290948f9285c984888a">[email&#160;protected]</span></a>
                            | News: <a href="#">news.newshub.com</a> | Advertising: <a href="#">ad.newshub.com</a> <br>Phone:
                            + 1234 8812345, 880112345 + 1359, 6356 + 112-11-9874</p>
                    </address>
                </div>
            </div>
        </div>
    </footer>

    <script data-cfasync="false" src="{{ asset('assets/newshub/cdn-cgi/scripts/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/newshub/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/marquee.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/theia-sticky-sidebar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/jquery.jplayer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/jplayer.playlist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/slick.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/carouFredSel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/magnific-popup.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/newshub/js/main.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', "{{ asset('assets/newshub/www.google-analytics.com/analytics.js') }}", 'ga');

        ga('create', 'UA-73239902-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="{{ asset('assets/newshub/cdn-cgi/scripts/rocket-loader.min.js') }}" data-cf-settings="81b4d21024b0c34dec3e798a-|49" defer=""></script>
</body>


</html>