<!DOCTYPE html>
<html>
<head>
<<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
<div ng-app="myApp" ng-controller="myCtrl">
<div class = "container">    
    <div class = "loginheader">
    <h1>IMS</h>
    <p>INVENTORY MANAGEMENT SYSTEM</p>
    </div>
        <div class = "loginbody">
        <form name="myForm" id="myForm">
        <h2>Login</h2>
        <div class="form-group">
        <input type = "hidden" name = "id" ng-model="id">
        <label for="email" class = "labels">Email:</label>
        <input type="email" class="form-control" id="email"ng-model="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
        <label for="pwd" class = "labels">Password:</label>
        <input type="password" class="form-control" id="pwd"ng-model="password" placeholder="Enter password" name="pwd">
        </div>
        <div>
        <button type="submit"  ng-click="loginitem()" class="btn btn-default">Login</a></button>
        <button type="submit" class="btn btn-default"><a href = "register.php">Register</a></button>
        </div>
        </form>
        </div>
        </div>
        <script>
  var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        
            $scope.loginitem= function (){
            if($scope.email !==undefined && $scope.password !==undefined){
            var request = $http({
            method: "post",
            url: "regprocess.php",
            data: {
                updatetype: "check",
            email: $scope.email,
            password: $scope.password,
          }
        }).then(function(response){
         var status = response.data.status;
          if(status == "sucess"){
           alert("login sucess"+response.data.status);
          }else{
                    alert("Sorry! Data Couldn't be inserted!");
                  
                }
        
              });
}
}
});
</script>

</body>
</html>
