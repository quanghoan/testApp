
var app = angular.module('TestApp', [], function($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});

app.controller('TestController', function ($scope, $http) {
  $scope.members = [];
  $scope.isEdit = false;
  $scope.memID = "";
  $scope.deleteID = "";
  $scope.member = {
    name: "",
    email: "",
    phone: "",
    image: ""
  };

  $scope.getMember = function () {
    $http.get('/getmembers')
      .then(function (data) {
        $scope.members = data.data;
      });
  };
  $scope.getMember();
  $scope.Edit = function (id) {
    $scope.isEdit = true;
    $scope.memID = id;
  };
  $scope.saveData = function () {
    // Posting data to php file
    $http({
      method: 'POST',
      url: '/member',
      data: JSON.stringify($scope.member),  //forms user object
      //headers : {'Content-Type': 'application/x-www-form-urlencoded'}
    })
      .success(function (data) {
        $scope.getMember();
        console.log(data);
      }).error(function (data) {
      console.log(data);
    });
  };

  $scope.saveEditData = function () {
    $http({
      method: 'PATCH',
      url: '/member/'+$scope.memID ,
      data: JSON.stringify($scope.member),  //forms user object
    })
    .success(function (data) {
      $scope.getMember();
      console.log(data);
    })
    .error(function (data) {
      console.log('There was a problem. Status: ' + status + '; Data: ' + data);
    });
    $http.patch('/member/' + $scope.memID, $scope.member).then($scope.getMember(), errorCallback);
  };

  $scope.deleteData = function (id) {
    $scope.deleteID = id;
    //$http({
    //    method: 'DELETE',
    //    url: '/member/'+$scope.deleteID,
    //}).then(function mySucces(response) {
    //    $scope.getMember();
    //}, function myError(response) {
    //    $scope.myWelcome = response.statusText;
    //});
    $http.delete('/member/' + $scope.deleteID, $scope.member).then($scope.getMember(), errorCallback);
  };
});