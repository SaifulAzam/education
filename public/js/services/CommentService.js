angular.module('CommentService', [])

.factory('Comment', function($http){

        return {
            get : function (data) {
                return $http({
                    method: 'GET',
                    url: '/api/v1/comments',
                    params: {page: data}
                });
            },

            save : function(commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/v1/comments',
                    headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
                    data: $.param(commentData)
                });
            },

            destroy : function(id) {
                return $http.delete('/api/v1/comments/' + id);
            }
        }

    });

