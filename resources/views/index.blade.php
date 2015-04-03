<!-- app/views/index.php -->

<!doctype html> <html lang="en"> <head> <meta charset="UTF-8"> <title>Laravel and Angular Comment System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/app.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="/plugins/fontawesome/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .comment    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/angular.min.js"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/MainController.js"></script> <!-- load our controller -->
    <script src="js/services/CommentService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commentApp" ng-controller="MainController">

<div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Commenting System</h4>
    </div>

    <!-- NEW COMMENT FORM =============================================== -->
    <form ng-submit="submitComment()"> <!-- ng-submit will disable the default form action and use our function -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!-- AUTHOR -->
        <div class="form-group">
            <input type="text" class="form-control input-sm" name="user_id" ng-model="commentData.user_id" placeholder="Name">
        </div>

        <!-- COMMENT TEXT -->
        <div class="form-group">
            <input type="text" class="form-control input-lg" name="comment" ng-model="commentData.comment" placeholder="Say what you have to say">
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE COMMENTS =============================================== -->
    <!-- hide these comments if the loading variable is true -->
    <div class="comment" ng-hide="loading" ng-repeat="comment in comments">
        <h3>Comment #<< comment.id >> <small>by << comment.user_id >> </h3>
        <p><< comment.comment >></p>

        <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
    </div>
    <button class="btn btn-success" ng-click="loadMore()">Load More</button>

</div>
</body>
</html>