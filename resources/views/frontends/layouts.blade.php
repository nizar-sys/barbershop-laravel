<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Barber Shop | @yield('title')</title>
    <script src="{{ asset('/fe') }}/js/vendor/jquery-1.12.4.min.js"></script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/fe') }}/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/elegant-font-icons.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/elegant-line-icons.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/themify-icons.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/barber-icons.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/animate.min.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/venobox/venobox.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/nice-select.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/owl.carousel.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/slicknav.min.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/main.css">

    <link rel="stylesheet" href="{{ asset('/fe') }}/css/responsive.css">
    <script src="{{ asset('/fe') }}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>

<body>
    <div id='preloader'>
        <div class='loader'>
            <img src="{{ asset('/fe') }}/img/loading.gif" width="80" alt="">
        </div>
    </div>
    <header id="header" class="header-section">
        <div class="container">
            <nav class="navbar ">
                <a href="#" class="navbar-brand"><img src="{{ asset('/assets/img/brand/logo-1.jpeg') }}"
                        alt="Barbershop" class="img-fluid" width="70"></a>
                <div class="d-flex menu-wrap align-items-center">
                    <div id="mainmenu" class="mainmenu">
                        <ul class="nav">
                            <li><a data-scroll class="nav-link active" href="{{ url('/') }}">Home<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li><a href="#about">About</a>
                            </li>
                            <li><a href="#services">Services</a>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="#appointments">Appointment</a></li>
                                    <li><a href="#team">Our Team</a></li>
                                    <li><a href="#pricings">Our Pricing</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="header-btn">
                        <a href="#appointments" class="menu-btn">Make Appointment</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <div class="sponsor_section bg-grey padding">
        <div class="container">
            <ul id="sponsor_carousel" class="sponsor_items owl-carousel">
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-1.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-2.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-3.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-4.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-5.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-1.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-2.png" alt="sponsor-image">
                </li>
                <li class="sponsor_item">
                    <img src="{{ asset('/fe') }}/img/sponsor-3.png" alt="sponsor-image">
                </li>
            </ul>
        </div>
    </div>

    <section class="widget_section padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 sm-padding">
                    <div class="footer_widget">
                        <img class="mb-15" src="{{ asset('/assets/img/brand/logo-1.jpeg') }}" width="150"
                            alt="Brand">
                        <p>Our barbershop is the created for men who appreciate premium quality, time and flawless look.
                        </p>
                        <ul class="widget_social">
                            <li><a href="#"><i class="social_facebook"></i></a></li>
                            <li><a href="#"><i class="social_twitter"></i></a></li>
                            <li><a href="#"><i class="social_googleplus"></i></a></li>
                            <li><a href="#"><i class="social_instagram"></i></a></li>
                            <li><a href="#"><i class="social_linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-padding">
                    <div class="footer_widget">
                        <h3>Address</h3>
                        <p>
                            J. Dr. Wahidin no 3B, Penumping, Kec. Laweyan,
                            Kota Surakarta, Jawa Tengah
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 sm-padding">
                    <div class="footer_widget">
                        <h3>Opening Hours</h3>
                        <ul class="opening_time">
                            <li>Monday - Friday 10.00 - 21.00</li>
                            <li>Saturday - Monday: 10.00 - 21.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 xs-padding">
                    <div class="copyright">&copy;
                        <script type="text/javascript">
                            document.write(new Date().getFullYear())
                        </script> Barber Shop

                    </div>
                </div>
                <div class="col-md-6 xs-padding">

                </div>
            </div>
        </div>
    </footer>
    <a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>


    <script src="{{ asset('/fe') }}/js/vendor/bootstrap.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/imagesloaded.pkgd.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/owl.carousel.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/jquery.isotope.v3.0.2.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/smooth-scroll.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/venobox.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/jquery.ajaxchimp.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/jquery.slicknav.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/jquery.nice-select.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/jquery.mb.YTPlayer.min.js"></script>

    <script src="{{ asset('/fe') }}/js/vendor/wow.min.js"></script>

    <script src="{{ asset('/fe') }}/js/contact.js"></script>

    <script src="{{ asset('/fe') }}/js/main.js"></script>

    @stack('script')
</body>


</html>
