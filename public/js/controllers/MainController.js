angular.module('MainController', [])

.controller('MainController', function ($scope, $http, Comment) {
    $scope.commentData = {};
    $scope.loading = true;
    $scope.lastpage = 1;

    $scope.init = function(){
        Comment.get($scope.lastpage)
            .success(function(data) {
                $scope.comments = data.data;
                $scope.currentpage = data.current_page;
                $scope.loading = false;
            });
    };

    $scope.submitComment = function() {
        $scope.loading = true;

        Comment.save($scope.commentData)
            .success(function(data){
                Comment.get($scope.lastpage)
                    .success(function(getData) {
                        $scope.comments = getData;
                        $scope.loading = false;
                    });
            })
            .error(function(data){
                console.log(data);
            });
    };

    $scope.deleteComment = function (id) {
        $scope.loading = true;

        Comment.destroy(id)
            .success(function(data){
                Comment.get($scope.lastpage)
                    .success(function(getData){
                        $scope.comments = getData;
                        $scope.loading = false;
                    });
            });
    };

    $scope.loadMore = function () {
        $scope.lastpage += 1;
        Comment.get($scope.lastpage)
            .success(function(data) {
                $scope.comments = $scope.comments.concat(data.data);
                console.log($scope.comments);
            });
    };

    $scope.init();
});
