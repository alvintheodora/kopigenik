<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Styles --> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/kopigenik.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid container-navbar">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive" src="asset/kopigenikbanner.png"></a>

                </div>
                <div class="collapse navbar-collapse navbarKu" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navBurger"><a class="navbarKu" href="\subscribe">SUBSCRIBE</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\beans">BEANS</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\videos">VIDEOS</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\about-us">OUR STORY</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\faq">FAQ</a></li>
                        <li class="navBurger"><a class="navbarKu" href="\blog">BLOG</a></li>
                        <li class="dropdown">
                            @guest
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">GUEST <span class="caret"></span></a>
                                
                                <ul class="dropdown-menu">
                                    <li class="navBurger"><a class="navbarKu" href="{{ route('login') }}">LOGIN</a></li>
                                    <li class="navBurger"><a class="navbarKu" href="{{ route('register') }}">REGISTER</a></li>
                                </ul>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{auth()->user()->name}} <span class="caret"></span></a>
                                
                                <ul class="dropdown-menu">
                                    <li class="navBurger">
                                        <a class="navbarKu" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            LOGOUT
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            @endguest
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- navbar-fixed clear -->
        <div class="after-navbar" style="margin-bottom: 60px;"></div>

        <!-- Content -->
        @yield('content')

        <!--Footer-->
        <footer class="footer-btm container-fluid container-inner bg-black1">
            <div class="row">
                <div class="col-sm-4">
                    <h5 style="color: #f7db9c;">QUICK LINKS</h5>
                    <ul>
                        <li><a href="\subscribe">Subscribe</a></li>
                        <li><a href="\beans">Beans</a></li>
                        <li><a href="\login">Login</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h5 style="color: #f7db9c;">ABOUT US</h5>
                    <ul>
                        <li><a href="\about-us">What is Kopigenik</a></li>
                        <li><a href="\faq">FAQ</a></li>
                        <li><a href="\blog">Blog</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h5 style="color: #f7db9c;">SOCIAL MEDIA</h5>
                    <ul>
                        <li>
                            <a href="https://facebook.com/kopigenik" target="__blank">
                                <img class="icon-social-media" src="{{asset('asset/icon-facebook.svg')}}">
                                <span>Kopigenik_id</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/kopigenik" target="__blank"">
                                <img class="icon-social-media" src="{{asset('asset/icon-instagram.svg')}}">
                                <span>Kopigenik</span>
                            </a>
                        </li>
                        <li>                        
                            <img class="icon-social-media" src="{{asset('asset/icon-line.jpg')}}">
                            <span style="color: #fff;">@Kopigenik</span>                            
                        </li>
                        <li style="margin-left: 50px;">
                            <div class="line-it-button" data-lang="en" data-type="friend" data-lineid="@kopigenik" data-count="true" data-home="true" style="display: none; padding-top: 5px;"></div>                            
                        </li>
                    </ul>
                </div>
            </div>
        </footer>


    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.js')}}"></script>
	<script src="{{asset('js/kopigenik.js')}}"></script>
	<script src="{{asset('js/velocity.js')}}"></script>
    <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
    <script type="text/javascript">
            $pathnameLocal = (location.pathname).substr(18);//18 karena potong tulisan /kopigenik-master/
            $pathnameHosting = (location.pathname).substr(1);//1 karena potong /
            $(".nav li").each(function(){       
                if($(this).children().attr("href") == $pathnameLocal){
                    $(this).addClass("active");
                }
            });
    </script>

</body>
</html>
