angular.module('StudentsService', [])

    .factory('student', function($http){

        return {
            get : function (owner, page) {
                return $http({
                    method: 'GET',
                    url: '/api/v1/comments',
                    params: {owner: owner,  page: page}
                });
            },

            save : function(commentData) {
                console.log(commentData);
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

