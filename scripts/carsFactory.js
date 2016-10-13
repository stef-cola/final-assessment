angular
	.module('abccars')
	.factory('carsFactory', function($http) {

		function getcars() {
			return $http.get('data/data.json');
		}

		return {
			getcars: getcars
		}
	});