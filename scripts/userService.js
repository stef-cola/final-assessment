angular
	.module('abccars')
	.service('userService', function($http) {
		return {
			register(name, email, password) {
				return $http.post('signup.php', {name:name, email:email, password:password});
			}
		}
	});
