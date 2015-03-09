/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {


    function load() {
        $.post('./LoadDataAssetRegister', {
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    }

    load();

    $scope.loadAsset = function () {
        load();
    };

    $scope.exportPDF = function () {
        window.open('ReportOnePagePD44TOPDF');
    };


    $scope.showDetail = function () {

        $http.get('./ShowDataDetail').success(function (data) {
            $('#showListDetail2').html(data);
            $('.bs-example-modal-lg2').modal('show');
            $('.bs-example-modal-lg').modal('hide');
        });
    };

    $scope.permitAsset = function () {
        $http.get('./ShowListDataStock').success(function (data) {
            $('#showListDetail2').html(data);
            $('.bs-example-modal-lg2').modal('hide');
            $('.bs-example-modal-lg').modal('hide');
            $scope.listDataStock = data;
            $('.bs-example-modal-lg3').modal('show');
        });
    };
    
    $('#showDataStock').on('change','.saveStock',function(){
        //alert($(this).val()+','+$(this).attr('data-save'));
        
        $.post('./AppStock',{
            id:$(this).attr('data-save'),
            data:$(this).val()
        },function(data,status){
           console.log(data+','+status); 
        });
        
    });
    
    $('#showDataStock').on('click','.linkPD59',function(){
        event.preventDefault();
        //alert($(this).val()+','+$(this).attr('data-save'));
        
        window.open('ReportPD59/'+$(this).attr('data-id59'));
    });

    
    $scope.ref = function(){
        window.location.href = './NotificationsList';
    };

    $scope.openReport = function () {
        window.open("./ReportOnePagePD44", "myWindow", "status = 1, height = 650, width = 1080, resizable = 0");

    };


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


    $('#showDataFile').on('click', '.dataFile', function () {
        var file = $(this).attr('data-src');
        console.log(file);

        //window.popup('./OpenFilePDF?fileData='+file);
        window.open("./OpenFilePDF?fileData=" + file, "myWindow", "status = 1, height = 650, width = 1000, resizable = 0");
        return false;

    });


    $('#type_asset_id').change(function () {
        if ($('#institution').val() !== '') {
            $.post('./LoadDataAssetRegister', {
                tta: $('#type_asset_id').val(),
                int: $('#institution').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        } else {
            $.post('./LoadDataAssetRegister', {
                ta: $('#type_asset_id').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        }

    });

    $('#division').change(function () {
        $.post('./LoadDataAssetRegister', {
            di: $('#division').val()
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    });

    $('#institution').change(function () {
        $.post('./LoadDataAssetRegister', {
            ins: $('#institution').val()
        }, function (data) {
            //assign(data);

            $('#bodyDataTable').html(data);

            $('#dataTable').dataTable(

                    );

        });
    });



    $('#tb_nature_asset_nature_asset_id').change(function () {
        if ($('#institution').val() !== '') {
            $.post('./LoadDataAssetRegister', {
                nnt: $('#tb_nature_asset_nature_asset_id').val(),
                int: $('#institution').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        } else {
            $.post('./LoadDataAssetRegister', {
                nt: $('#tb_nature_asset_nature_asset_id').val()
            }, function (data) {
                //assign(data);

                $('#bodyDataTable').html(data);

                $('#dataTable').dataTable(

                        );

            });
        }
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


    /////change division
    $('#division').change(function () {
        $.post('./ListInstitutionOption', {
            id: $('#division').val()
        }, function (data) {
            var list = '<option value=""></option>';

            var obj = JSON.parse(data);
            $.each(obj, function (i, item) {
                list += "<option value='" + obj[i].institution_id + "'>" + obj[i].institution + "</option>";
            });
            $('#institution').html(list);

            $("#institution").trigger("chosen:updated");

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