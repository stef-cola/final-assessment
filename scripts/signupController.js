angular
	.module('abccars')
	.controller('signupController', function($scope, userService) {
    $scope.signup = function () {
      userService
        .register($scope.name, $scope.email, $scope.password)
        .success(function(data){
          $scope.result = data;
        })
        .error(function(error){
          $scope.error = true;
        })
    }
  });
