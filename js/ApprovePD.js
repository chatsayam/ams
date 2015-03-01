
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
    
    $scope.warning = function () {
        
    };
    
    $scope.success = function () {
        if(confirm('ยืนยันการอนุมัติคำขอขึ้นทะเบียน')){
            $http.get('./ApprovePDSuccess').success(function (data) {
                if(data === '1'){
                    //alert('อนุมัติคำขอขึ้นทะเบียนเรียบร้อยแล้ว');
                    //window.location.href = '../';
                    
                    $http.get('./ShowIDStockApprove').success(function (data) {
                        $('#showDataIDApprove').html(data);
                        $('.bs-example-modal-lgPD').modal('show');
                        $('#id_warning').attr('disabled',true);
                        $('#id_saccess').attr('disabled',true);
                    });
                }else {
                    alert('การอนุมัติคำขอประสบปัญญา กรุณาลองใหม่ในภายหลัง');
               }
            });
        }
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