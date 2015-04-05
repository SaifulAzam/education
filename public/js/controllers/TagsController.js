angular.module('TagsController', [])

    .controller('TagsController', function ($scope, $http, Tags) {
        $scope.tagData = {};
        $scope.loading = true;

        $scope.init = function() {
            Tags.get()
                .success(function (data) {
                    $scope.tags = data.data;
                    $scope.loading = false;
                });

        };

        $scope.init();
    });
