
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>家教集中营</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/all.css"/>
    <link rel="stylesheet" href="/assets/plugins/select2/select2.min.css"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@include('back.partials.nav')
<div class="container-fluid">
    <div class="row">
        @include('back.partials.sidenav')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/all.js"></script>

<script src="/assets/plugins/select2/select2.js"></script>
<script src="/js/bootstrap.min.js"></script>

@yield('footer')

</body>
</html>
