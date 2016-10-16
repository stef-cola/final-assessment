angular
	.module('abccars')
	.factory('carsFactory', function($http) {
		return {
			getcars() {
				return $http.get('cars.php');
			}
		}
	});
