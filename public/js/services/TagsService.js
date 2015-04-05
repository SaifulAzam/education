angular.module('TagsService', [])

    .factory('Tags', function($http){

        return {
            get : function () {
                return $http({
                    method: 'GET',
                    url: '/api/v1/tags'
                });
            },

            save : function(commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/v1/tags',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
                    data: $.param(commentData)
                });
            }
        }

    });

