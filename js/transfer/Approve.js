var App = angular.module('myApp', []);
App.controller('mainController', function($scope, $http) {

});

function getSearchApprove(){
    $.post( "./SearchApprove",{}, function(response) {
        var dataRows = '';
        if(response!='[]'){
            $.each($.parseJSON(response), function(index, value) {
                dataRows += '<tr>';
                    dataRows += '<td>';
                        dataRows += (index+1);
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
                        dataRows += value['feature'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                        dataRows += value['machine_code'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                        dataRows += value['division'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                        dataRows += value['institution'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    if(value['transfer_code']==null){
                        dataRows += '<button type="button" class="btn btn-success btn-xs bApprove" asset-code="'+value['asset_code']+'" transfer-id="'+value['SidTransfer']+'">อนุมัติ</button>';
                    }else{
                        dataRows += '<button type="button" class="btn btn-info btn-xs bReport" transfer-id="'+value['SidTransfer']+'">พ.ด.45</button>';
                    }
                    dataRows += '</td>';
                dataRows += '</tr>';
            });
        }
        
        $('#ShowList').html(dataRows);
    });
}

getSearchApprove();


$('#ShowList').on('click','.bApprove',function(){
    $('#t_asset_code').text($(this).attr('asset-code'));
    $('#transfer_id').val($(this).attr('transfer-id'));
    $('#modalApprove').modal('show');
    $('.form-control').val('');
});

$('#bSaveApprove').click(function(){
    if($('#transfer_code').val()==''||$('#transfer_date').val()==''){
        alert('กรุณากรอกข้อมูลให้ครบถ้วน');
    }else{
        if(confirm('ยืนยันการอนุมัติการโอน/ย้ายครุภัณฑ์')){
            $.post( "./SaveApprove",{transfer_code:$('#transfer_code').val(),transfer_date:$('#transfer_date').val(),transfer_id:$('#transfer_id').val()}, function(response) {
                if(response="ok"){
                    alert('อนุมัติ การโอน/ย้ายครุภัณฑ์ เรียบร้อย');
                    getSearchApprove();
                    $('#modalApprove').modal('hide');
                }
            });
        }
    }
    
});

$('#bDelRequest').click(function(){
    if(confirm('ยืนยันการยกเลิกการขอโอน/ย้ายครุภัณฑ์')){
        $.post( "./DelRequest",{transferId:$('#transfer_id').val()}, function(response) {
            if(response=='ok'){
                alert('ยกเลิกการขอโอน/ย้ายครุภัณฑ์ เรียบร้อย');
                getSearchApprove();
                $('#modalApprove').modal('hide');
            }
        });
    }
    
});

        
$('#ShowList').on('click','.bReport',function(){
    var tranferID = $(this).attr('transfer-id');
    window.open("./ReportPD45/"+tranferID, "myWindow", "status = 1, height = 650, width = 1024, resizable = 0");
});





