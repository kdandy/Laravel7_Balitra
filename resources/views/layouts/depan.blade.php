<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Responsive Onepage HTML Template | Multi</title>
    <!-- core CSS -->
    <link href="{{asset('depan/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/owl.transitions.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('depan/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{asset('depan/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{asset('depan/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{asset('depan/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('depan/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>
<!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="{{asset('depan/images/logo.png')}}" alt="logo"
                            width="60px"> </a>
                    <a class="navbar-brand" href="/" style="margin-top:18px !important;">Balai Penelitian Pertanian Lahan Rawa (BALITTRA)</a>
                </div>

                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="/">Header</a></li>
                        <li class="scroll"><a href="#features">Fungsi BALITTRA</a></li>
                        <li class="scroll"><a href="#services">Objek Penelitian</a></li>
                        <li class="scroll"><a href="#about">Tentang Kami</a></li>
                        <li class="scroll"><a href="#blog">Berita</a></li>
                        <li class="scroll"><a href="{{Route('index')}}">Login</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->


    @yield('content')

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    &copy; 2020 BALITTRA</a>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->
    @include('sweetalert::alert')
    <script src="{{asset('depan/js/jquery.js')}}"></script>
    <script src="{{asset('depan/js/bootstrap.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="{{asset('depan/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('depan/js/mousescroll.js')}}"></script>
    <script src="{{asset('depan/js/smoothscroll.js')}}"></script>
    <script src="{{asset('depan/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('depan/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('depan/js/jquery.inview.min.js')}}"></script>
    <script src="{{asset('depan/js/wow.min.js')}}"></script>
    <script src="{{asset('depan/js/main.js')}}"></script>
</body>

</html>