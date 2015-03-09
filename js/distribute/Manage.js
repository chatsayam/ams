var App = angular.module('myApp', []);
App.controller('mainController', function($scope, $http) {

});

function GetList(){
    $.post("./GetList", {}, function(response) {
        var dataRows = '';
        if (response != '[]') {
            $.each($.parseJSON(response), function(index, value) {
                dataRows += '<tr>';
                    dataRows += '<td>';
                    dataRows += (index + 1);
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['distribute_code'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['distribute_name'];
                    dataRows += '</td>';
                dataRows += '</tr>';
            });
        }

        $('#ShowList').html(dataRows);
    });
}

GetList();

$('#ShowList').on('click','.bModalCode', function(){
    $('#tb_distribute_distribute_id').val($(this).attr('idDis'));
    $('.form-control').val('');
    $('#ModalCode').modal('show');
});

$('#bAddModal').click(function(){
    $('.form-control').val('');
    $('#ModalAdd').modal('show');
});



$('#bSave').click(function(){
    if($('#distribute_date').val()==''||$('#distribute_code').val()==''||$('#distribute_code').val()==''||$('#distribute_name').val()==''){
        alert('กรุณากรอกข้อมูลให้ครบถ้วน');
    }else{
        
        $.post("./SaveDistribute", {data:{distribute_date:$('#distribute_date').val(),distribute_code:$('#distribute_code').val(),distribute_name:$('#distribute_name').val()}}, function(response) {
            if(response=='ok'){
                alert('บันทึกการจำหน่ายเรียบร้อย');
                $('#ModalAdd').modal('hide');
                GetList();
            }
        });
    }
});


$('#bAdd').click(function(){
    //alert(55);
    if($('#tb_stocks_asset_code').val()==''||$('#tb_distribute_distribute_id').val()==''){
        alert('กรุณากรอกข้อมูลให้ครบถ้วน');
    }else{
        $.post("./SaveCode", {data:{tb_stocks_asset_code:$('#tb_stocks_asset_code').val(),tb_distribute_distribute_id:$('#tb_distribute_distribute_id').val()}}, function(response) {
            if(response=='ok'){
                alert('จำหน่ายครุภัณฑ์เรียบร้อย');
                $('#ModalCode').modal('hide');
                GetList();
            }else{
                alert('ผิดพลาด ครุภัณฑ์ไม่ได้อยู่ในสภานะรอจำหน่ายหรือเลขรหัสครุภัณฑ์ผิด');
            }
        });
    }
});

