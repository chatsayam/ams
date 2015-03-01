
var tdata;

var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    $scope.showDetail = function(){
        
        $http.get('./../Asset/ShowDataDetail').success(function (data) {
            $('#showListDetail').html(data);
        });
    };

    $scope.openReport = function () {
        window.open("./../Asset/ReportOnePagePD44", "myWindow", "status = 1, height = 650, width = 1024, resizable = 0");

    };

    $scope.exportPDF = function () {
        window.open('./../Asset/ReportOnePagePD44TOPDF');
    };
    
    $scope.warning = function(){
        
    };

    $('#showDataFile').on('click', '.dataFile', function () {
        var file = $(this).attr('data-src');
        console.log(file);

        window.open("./../Asset/OpenFilePDF?fileData=" + file, "myWindow", "status = 1, height = 650, width = 1000, resizable = 0");
        return false;

    });
    
    showListDataFile();

    function showListDataFile() {
        $http.get('./../Asset/ShowListDataFile').success(function (data) {
            $scope.listDataFile = data;
        });
    }
    
    function ShowListDataStock() {

        $http.get('./../Asset/ShowListDataStock').success(function (data) {
            $scope.listDataStock = data;
        });
    }

});