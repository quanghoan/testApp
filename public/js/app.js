
var app = angular.module('hoandq', [], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

app.controller('quanghoan', function ($scope, $http) {
  $scope.user = {
    name: "",
    address: "",
    age: "",
    photo: ""
  };

  $scope.users = [];
  $scope.getusers = function () {
    $http.get('/getusers')
      .then(function (data) {
        $scope.users = data.data;
      });
  };
  $scope.getusers();

  $scope.user_id = "";
  $scope.deleteUser = function (id) {
    $scope.user_id = id;
    $http.delete('/user/' + $scope.user_id, $scope.user).then($scope.getusers(), errorCallback);
  };

  $scope.createUser = function () {
    $http({
      method: 'POST',
      url: '/user',
      data: JSON.stringify($scope.user),
    })
  };
});  