var App = angular.module('myApp', []);
App.controller('mainController', function($scope, $http) {

});

function GetList(){
    $.post("./GetList", {string: $('#f_string').val()}, function(response) {
        var dataRows = '';
        if (response != '[]') {
            $.each($.parseJSON(response), function(index, value) {
                dataRows += '<tr>';
                    dataRows += '<td>';
                    dataRows += (index + 1);
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['asset_code'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['type_asset'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['nature_asset'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['machine_code'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += '<button type="button" class="btn btn-info btn-xs bManage" transfer-id="'+value['SidTransfer']+'">เอกสาร</button>';
                    dataRows += '</td>';
                dataRows += '</tr>';
            });
        }

        $('#ShowList').html(dataRows);
    });
}

GetList();


$('#f_string').keyup(function(){
    GetList();
});

$('#bLookAll').click(function(){
    $('#f_string').val('');
    GetList();
});

$('#ShowList').on('click','.bManage', function(){
    var tranferID = $(this).attr('transfer-id');
    window.open("./ReportPD45/"+tranferID, "myWindow", "status = 1, height = 650, width = 1024, resizable = 0");
});





