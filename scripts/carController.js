angular
	.module('abccars')
	.controller('carController', function($scope, carsFactory) {

		$scope.cars;

		$scope.priceInfo = {
			min: 0,
			max: 1000000
		}

		$scope.contactDealer = false;

		$scope.newListing = {};

		$scope.addcar = function(newListing) {
			newListing.image = 'default-car';
			$scope.cars.push(newListing);
			$scope.newListing = {};
		}

		$scope.editcar = function(car) {
			$scope.editListing = true;
			$scope.existingListing = car;
		}

		$scope.contactDealer = function(currentCar) {
			$scope.contactDealer = true;
			$scope.currentCar = currentCar;
		}

		$scope.savecarEdit = function() {
			$scope.existingListing = {};
			$scope.editListing = false;
		}

		$scope.deletecar = function(listing) {
			var index = $scope.cars.indexOf(listing);
			$scope.cars.splice(index, 1);
			$scope.existingListing = {};
			$scope.editListing = false;
		}

		carsFactory.getcars().success(function(data) {
			$scope.cars = data;
		}).error(function(error) {
			console.log(error);
		});

	});
