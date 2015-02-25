var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    
    $('#tb_nature_asset_nature_asset_id').change(function () {
        $.post('./RequestStockList', {
            na_id: $('#tb_nature_asset_nature_asset_id').val()
        }, function (data) {
            $('#bodyDataTable').html(data);
        });
    });
    
    $('#type_asset_id').change(function () {
        $.post('./RequestStockList', {
            nt_id: $('#type_asset_id').val()
        }, function (data) {
            $('#bodyDataTable').html(data);
        });
    });
    
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