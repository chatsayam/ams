/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {



    //$scope.listDataFile = [];

    function showListDataFile() {
        $http.get('./ShowListDataFile').success(function (data) {
            $scope.listDataFile = data;
        });
    }


    $('#bodyDataTable').on('click', '.data-id', function () {
        //alert($(this).attr('data-id'));

        $.post('./ShowListDataFile', {
            assetID: $(this).attr('data-id')
        }, function (data) {
            //$scope.listDataFile = data;
            showListDataFile();
            $('.bs-example-modal-lg').modal('show');
        });


    });

    $scope.showDetail = function () {

        $http.get('./ShowDataDetail').success(function (data) {
            $('#showListDetail2').html(data);
            $('.bs-example-modal-lg2').modal('show');
            $('.bs-example-modal-lg').modal('hide');
        });
    };



    $scope.openReport = function () {
        window.open("./ReportOnePagePD44", "myWindow", "status = 1, height = 650, width = 1080, resizable = 0");

    };

    $scope.ReportCancel = function () {
        //window.open('ReportOnePagePD44TOPDF');
        if (confirm('ยืนยันการยกเลิกคำขอขึ้นทะเบียน')) {
            $.post('./CancelDataAssetRegister', {
                state : 'del'
            }, function (data) {
                window.location.href = './ManageRegister';
            });
        }
    };
    
    $scope.ReportEdit = function () {
        window.open('Register?EDIT=EDIT');
    };

    $scope.exportPDF = function () {
        window.open('ReportOnePagePD44TOPDF');
    };


    $('#showDataFile').on('click', '.dataFile', function () {
        var file = $(this).attr('data-src');
        console.log(file);

        //window.popup('./OpenFilePDF?fileData='+file);
        window.open("./OpenFilePDF?fileData=" + file, "myWindow", "status = 1, height = 650, width = 1000, resizable = 0");
        return false;

    });

    var assetData;

    function assign(temp) {
        assetData = temp;
        console.log(data);
        console.log(data.length);
    }


    function loadDataAsset() {
        $.post('./LoadDataAssetRegister', {
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    }

    loadDataAsset();

    $('#type_asset_id').change(function () {
        $.post('./LoadDataAssetRegister', {
            ta: $('#type_asset_id').val()
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    });



    $('#tb_nature_asset_nature_asset_id').change(function () {
        $.post('./LoadDataAssetRegister', {
            ta: $('#type_asset_id').val(),
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
        $.post('./ListNatureAsset', {
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