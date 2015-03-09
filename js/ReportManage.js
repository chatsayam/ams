/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var assetID = '';
var stockID = '';

var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    
    
    function load() {
        $.post('./LoadDataAsset', {
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    }

    load();
    
    
    $scope.exportPDF = function () {
        window.open('../Asset/ReportOnePagePD44TOPDF');
    };


    $scope.showDetail = function () {

        $http.get('../Asset/ShowDataDetail').success(function (data) {
            $('#showListDetail2').html(data);
            $('.bs-example-modal-lg2').modal('show');
            $('.bs-example-modal-lg').modal('hide');
        });
    };

    
    $scope.show59 = function(){
        
        window.open('../Asset/ReportPD59/'+stockID);
    };
    
    $scope.show591 = function(){
        
        window.open('../Asset/ReportPD591?assetID='+assetID);
    };


    $scope.openReport = function () {
        window.open("../Asset/ReportOnePagePD44?assetID="+assetID, "myWindow", "status = 1, height = 650, width = 1080, resizable = 0");

    };
    
    $('#showDataFile').on('click', '.dataFile', function () {
        var file = $(this).attr('data-src');
        console.log(file);

        //window.popup('./OpenFilePDF?fileData='+file);
        window.open("../Asset/OpenFilePDF?fileData=" + file, "myWindow", "status = 1, height = 650, width = 1000, resizable = 0");
        return false;

    });
    
    $scope.sell = function(){
        $http.get('./SellAdd/'+stockID).success(function (data) {
            if(data === '1'){
                alert('บันทึกสถานะคำขอแล้ว');
                window.location.href = './Manage';
            }
        });
    };
    
    /////////////////////
    
    function showListDataFile() {
        $http.get('../Asset/ShowListDataFile').success(function (data) {
            $scope.listDataFile = data;
        });
    }
    
    
    $('#bodyDataTable').on('click', '.data-id', function () {
        //alert($(this).attr('data-id'));
        
        assetID = $(this).attr('data-assetID');
        stockID = $(this).attr('data-stockID');

        $.post('../Asset/ShowListDataFile', {
            assetID: $(this).attr('data-assetID')
        }, function (data) {
            //$scope.listDataFile = data;
            showListDataFile();
            $('.bs-example-modal-lg').modal('show');
        });


    });
    
    
    $('#type_asset_id').change(function () {
        
            $.post('./LoadDataAsset', {
                ta: $('#type_asset_id').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        

    });





    $('#tb_nature_asset_nature_asset_id').change(function () {
        
            $.post('./LoadDataAsset', {
                nt: $('#tb_nature_asset_nature_asset_id').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        
    });
    
    //////////////////change type asset
    $('#type_asset_id').change(function () {
        $.post('../Asset/ListNatureAsset', {
            id: $('#type_asset_id').val()
        }, function (data) {
            var list = '<option value=""></option>';

            var obj = JSON.parse(data);
            $.each(obj, function (i, item) {
                list += "<option value='" + obj[i].nature_asset_id + "'>" + obj[i].nature_asset + "</option>";
            });
            $('#tb_nature_asset_nature_asset_id').html(list);

            $("#tb_nature_asset_nature_asset_id").trigger("chosen:updated");

            console.log(data);
        });
    });


   
    
});


var config = {
    '.chosen-select': {},
    '.chosen-select-deselect': {allow_single_deselect: true},
    '.chosen-select-no-single': {disable_search_threshold: 10},
    '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
    '.chosen-select-width': {width: "95%"}
};
for (var selector in config) {
    $(selector).chosen(config[selector]);
}