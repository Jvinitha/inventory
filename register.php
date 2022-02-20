<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>
<div ng-app="myApp" ng-controller="myCtrl"> 
<div class = "container">  
    <h2>Register</h2>
    <form name="myForm" id="myForm">
    <div class="form-group">
      <input type = "hidden" name = "id" ng-model="id">
      <label for="firstname">Firstname:</label>
      <input type="firstname" class="form-control" ng-model="fname" id="firstname" placeholder="Enter firstname" name="firstname">
    </div>
    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="lastname" class="form-control" id="lastname" ng-model="lname" placeholder="Enter lastname" name="pwlastnamed">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" ng-model="mail" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" ng-model="passwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default"  ng-click="regitem()">Register</button>
    </form>
</div>
</div>   

<script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {
        $http.get("regprocess.php")
       .then(function(response) {
       $scope.names = response.data;
       });
            $scope.regitem= function (){
            if($scope.fname !==undefined && $scope.lname !==undefined && $scope.mail!==undefined && $scope.passwd !==undefined){
            var request = $http({
            method: "post",
            url: "regprocess.php",
            data: {
                updatetype: "add",
            first: $scope.fname,
            last: $scope.lname,
            email: $scope.mail,
            pwd: $scope.passwd
          }
        }).then(function(response){
         var status = response.data.status;
          if(status == "already"){
           alert("Already register");
          }else{
                    alert("Inserted sucessfully");
                  
                }
              });
}
}
});
</script>
</div>    
</body>
</html>