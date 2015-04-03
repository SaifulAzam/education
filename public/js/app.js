var edu = angular.module('edu', ['MainController', 'CommentService', 'ngRoute'], function($interpolateProvider){
    $interpolateProvider.startSymbol('<<');
    $interpolateProvider.endSymbol('>>');
});

/*
edu.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/articles', {
                templateUrl: '/edu/resources/views/front/articles/index.blade.php',
                controller: 'RouteController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);
edu.controller('RouteController', function ($scope, $routeParams) {
    $scope.param = $routeParams.param;
});*/
