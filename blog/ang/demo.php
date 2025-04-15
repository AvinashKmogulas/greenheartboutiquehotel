<!doctype html>
<html>
 <head>
  <title>How to get data from MySQL with AngularJS - PHP</title>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
<script>
var fetch = angular.module('myapp', []);

fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
 $http({
  method: 'get',
  url: 'getData.php'
 }).then(function successCallback(response) {
  // Store response data
  $scope.users = response.data;
 });
}]);

</script>
 </head>
 <body ng-app='myapp'>

  <div ng-controller="userCtrl">
 
    <table >
 
      <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
      </tr>
  
      <!-- Display records -->
      <tr ng-repeat="user in users">
        <td>{{user.title}}</td>
        <td>{{user.description}}</td>
        <td>{{user.username}}</td>
      </tr>
 
    </table>
  </div>
 
 </body>
</html>