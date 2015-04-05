<!DOCTYPE html>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>家教集中营</title>

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/headers/header1.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/blocks.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/plugins/fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="/assets/plugins/parallax-slider/css/parallax-slider.css">
    <link rel="stylesheet" href="/assets/plugins/animate.css">
    <link rel="stylesheet" href="/assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/plugins/select2/select2.min.css"/>

    <!-- Blog Page Style -->
    @yield('css')
    <link rel="stylesheet" href="/assets/css/pages/blog.css">
    <link rel="stylesheet" href="/assets/css/pages/page_magazine.css">
    <link rel="stylesheet" href="/assets/css/pages/page_search.css">
    <link rel="stylesheet" href="/assets/css/pages/page_log_reg_v1.css">
    <!-- CSS Theme -->
    <link rel="stylesheet" href="/assets/css/themes/default.css" id="style_color">
    <!-- CSS Customization -->
    <link rel="stylesheet" href="/css/custom.css"/>

</head>
<body ng-app="edu">
    @include('front.partials.nav')
    @yield('content')
    @include('front.partials.footer')
    <!-- JS Customization -->
    <script src="/js/jquery.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/angular-route.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/controllers/CommentsController.js"></script> <!-- load our controller -->
    <script src="/js/controllers/TagsController.js"></script> <!-- load our controller -->
    <script src="/js/services/CommentsService.js"></script> <!-- load our service -->
    <script src="/js/services/TagsService.js"></script> <!-- load our service -->
    <!-- JS Global Compulsory -->
    <script type="text/javascript" src="/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/hover-dropdown.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
    <!-- JS Implementing Plugins -->
    <script type="text/javascript" src="/assets/plugins/flexslider/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/assets/plugins/parallax-slider/js/modernizr.js"></script>
    <script type="text/javascript" src="/assets/plugins/parallax-slider/js/jquery.cslider.js"></script>
    <script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery-appear.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery.parallax.js"></script>
    <script type="text/javascript" src="/assets/plugins/counter/waypoints.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/counter/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/owl-carousel/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="/assets/plugins/select2/select2.js"></script>
    <!-- JS Page Level -->
    <script type="text/javascript" src="/assets/js/app.js"></script>
    <script type="text/javascript" src="/assets/js/pages/index.js"></script>
    <script type="text/javascript" src="/assets/plugins/progress-bar.js"></script>
    <script type="text/javascript" src="/assets/plugins/owl-carousel.js"></script>
    <script type="text/javascript" src="/assets/plugins/datepicker.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();
            App.initSliders();
            Index.initParallaxSlider();
            OwlCarousel.initOwlCarousel();
            ProgressBar.initProgressBarVertical();
        });
        jQuery(document).ready(function() {
            $('.counter').counterUp({
                delay: 10,
                time: 3000
            });
        });

    </script>
    @yield('js')
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="assets/plugins/respond.js"></script>
    <![endif]-->
    @yield('footer')
    </body>
</html>
