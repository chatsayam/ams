/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    /*
    $scope.changeYear = function(){
        $http.get('./LoadDataAssetOnSell/'+$scope.st['y']).success(function (data) {
            $('#ReportData').html(data);
        });
    };
    */
   
   $('#year_cost').change(function(){
       $.post('./LoadDataAssetOnSell',{
           id : $('#year_cost').val()
       },function(data){
           $('#ReportData').html(data);
       });
   });
    
});