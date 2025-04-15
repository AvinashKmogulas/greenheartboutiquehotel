<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>

AngularJs filter Example

</title>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<script>

var app = angular.module("AngularfilterApp", []);

app.controller("filterctrl", function ($scope) {

$scope.users = [{

name: "Madhav Sai",

age: 11

}, {

name: "Suresh Dasari",

age: 29

}, {

name: "Rohini Alavala",

age: 29

}, {

name: "Praveen Kumar",

age: 24

}];

});

</script>

</head>

<body ng-app="AngularfilterApp">

<div ng-controller="filterctrl">

Enter Name to Filter:<input ng-model="searchtxt" type="text" placeholder="Flter key">

<table>

<tr><th>Name</th><th>Age</th></tr>

<tr ng-repeat="user in users | filter : searchtxt">

<td>{{user.name}}</td>

<td>{{user.age}}</td>

</tr>

</table>

</div>

</body>

</html>