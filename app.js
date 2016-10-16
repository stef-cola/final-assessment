var app = angular.module('abccars', ['ui.bootstrap','ngRoute']);
app.config(function($routeProvider){
  $routeProvider
  .when("/", {
    templateUrl : "templates/main.html"
  })
  .when("/signup", {
    templateUrl : "templates/signup.html"
  })
  .when("/about", {
    templateUrl : "templates/about.html"
  })
  .when("/contact", {
    templateUrl : "templates/contact.html"
  })
  .when("/login", {
    templateUrl : "templates/login.html"
  })
})
