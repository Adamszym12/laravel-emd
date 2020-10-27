<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>New Age - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/simple-line-icons/css/simple-line-icons.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('plugins/device-mockups/device-mockups.min.css')}}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/new-age.min.css')}}">

</head>

<body id="page-top">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('login')}}">Login</a>
    </div>
</nav>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-7 my-auto">
                <div class="header-content mx-auto">
                    <h1 class="mb-5">{{$content->section1->headers->header1}}</h1>
                    <a href="#" class="btn btn-outline btn-xl js-scroll-trigger">{{$content->section1->buttons->button1}}</a>
                </div>
            </div>
            <div class="col-lg-5 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="{{asset($content->section1->images->phone_image1)}}" style="height:100%; width: 100%; object-fit: cover;" class="img-responsive" alt="">
                            </div>
                            <div class="button">
                                <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="download bg-primary text-center" id="download">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="section-heading">{{$content->section2->headers->header1}}</h2>
                <p>{{$content->section2->paragraphs->paragraph1}}</p>
                <div class="badges">
                    <a class="badge-link" href="#"><img src="img/google-play-badge.svg" alt=""></a>
                    <a class="badge-link" href="#"><img src="img/app-store-badge.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features" id="features">
    <div class="container">
        <div class="section-heading text-center">
            <h2>{{$content->section3->headers->header1}}</h2>
            <p class="text-muted">{{$content->section3->paragraphs->paragraph1}}</p>
            <hr>
        </div>
        <div class="row">
            <div class="col-lg-4 my-auto">
                <div class="device-container">
                    <div class="device-mockup iphone6_plus portrait white">
                        <div class="device">
                            <div class="screen">
                                <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                <img src="{{asset($content->section3->images->phone_image1)}}"  style="height:100%; width: 100%; object-fit: cover;" class="img-responsive" alt="">
                            </div>
                            <div class="button">
                                <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 my-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="{{$content->section3->icons->icon1}}"></i>
                                <h3>{{$content->section3->headers->header2}}</h3>
                                <p class="text-muted">{{$content->section3->paragraphs->paragraph2}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="{{$content->section3->icons->icon2}}"></i>
                                <h3>{{$content->section3->headers->header3}}</h3>
                                <p class="text-muted">{{$content->section3->paragraphs->paragraph3}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="{{$content->section3->icons->icon3}}"></i>
                                <h3>{{$content->section3->headers->header4}}</h3>
                                <p class="text-muted">{{$content->section3->paragraphs->paragraph4}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="feature-item">
                                <i class="{{$content->section3->icons->icon4}}"></i>
                                <h3>{{$content->section3->headers->header5}}</h3>
                                <p class="text-muted">{{$content->section3->paragraphs->paragraph5}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta">
    <div class="cta-content">
        <div class="container">
            <h2>{{$content->section4->headers->header1}}</h2>
            <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">{{$content->section4->buttons->button1}}</a>
        </div>
    </div>
    <div class="overlay"></div>
</section>

<section class="contact bg-primary" id="contact">
    <div class="container">
        <h2>{{$content->section5->headers->header1}} <i class="{{$content->section5->icons->icon1}}"></i> {{$content->section5->headers->header2}}</h2>
        <ul class="list-inline list-social">
            <li class="list-inline-item social-twitter">
                <a href="#">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item social-facebook">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="list-inline-item social-google-plus">
                <a href="#">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            </li>
        </ul>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; Your Website 2020. All Rights Reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#">Privacy</a>
            </li>
            <li class="list-inline-item">
                <a href="#">Terms</a>
            </li>
            <li class="list-inline-item">
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
</footer>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="{{ asset('plugins/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for this template -->
<script src="{{ asset('js/new-age.min.js') }}"></script>

</body>

</html>
