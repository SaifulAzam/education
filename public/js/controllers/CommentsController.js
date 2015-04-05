angular.module('CommentsController', [])

    .controller('CommentsController', function ($scope, $http, Comment) {
        $scope.commentData = {};
        $scope.loading = true;
        $scope.lastpage = 1;
        $scope.typing = false;
        $scope.isMore = false;

        $scope.init = function(owner){
            $scope.owner = owner;
            //console.log('test');
            Comment.get(owner, $scope.lastpage)
                .success(function(data) {
                    $scope.comments = data.data;
                    $scope.currentpage = data.current_page;
                    $scope.loading = false;
                    if(data.total > data.per_page){
                        $scope.isMore = true;
                    }
                })
                .error(function (data) {
                    console.log(data);
                });
        };

        $scope.submitComment = function(owner, author_name) {
            $scope.loading = true;
            console.log('test');
            $scope.commentData.owner = owner;
            $scope.commentData.author_name = author_name;
            Comment.save($scope.commentData)
                .success(function(data){
                    $scope.commentData = {};
                    $scope.typing = false;
                    Comment.get($scope.owner, $scope.currentpage)
                        .success(function(getData) {
                            $scope.comments = getData.data;
                            $scope.loading = false;
                            if(data.total > data.per_page){
                                $scope.isMore = true;
                            }
                        });
                })
                .error(function(data){
                    console.log(data);
                });
        };

        $scope.deleteComment = function (id) {
            $scope.loading = true;

            Comment.destroy(id, $scope.owner)
                .success(function(data){
                    Comment.get($scope.owner, $scope.lastpage)
                        .success(function(getData){
                            $scope.comments = getData;
                            $scope.loading = false;
                        });
                });
        };

        $scope.loadMore = function () {
            $scope.lastpage += 1;
            $scope.loading = true;
            Comment.get($scope.owner, $scope.lastpage)
                .success(function(data) {
                    $scope.comments = $scope.comments.concat(data.data);
                    $scope.loading = false;
                    if($scope.lastpage === data.last_page){
                        console.log($scope.lastpage, data.last_page);
                        $scope.isMore = false;
                    }
                });
        };

        $scope.change = function () {
                $scope.typing = true;
        };
    });
