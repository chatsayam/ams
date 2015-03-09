var App = angular.module('myApp', []);
App.controller('mainController', function($scope, $http) {

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



var SearchAsset = '';

$('#type_asset_id').change(function(){
    $.post( "./TbNatureAsset",{id:$(this).val()}, function(response) {
        var list = '<option></option>';
        $.each($.parseJSON(response), function(index, value) {
            list += '<option value="' + value['nature_asset_id'] + '">' + value['nature_asset'] + '</option>';
        });
        $('#nature_asset_id').html(list);
        $('#nature_asset_id').trigger("chosen:updated");
        getSearchAsset('','');
        
    });
});

$('#nature_asset_id').change(function(){
    getSearchAsset('','');
});

$('#division_id').change(function(){
    $.post( "./TbInstitution",{id:$(this).val()}, function(response) {
        var list = '<option></option>';
        $.each($.parseJSON(response), function(index, value) {
            list += '<option value="' + value['institution_id'] + '">' + value['institution'] + '</option>';
        });
        $('#institution_id').html(list);
        $('#institution_id').trigger("chosen:updated");
        getSearchAsset('','');
    });
});

$('#institution_id').change(function(){
    getSearchAsset('','');
});

$('#asset_code').keyup(function(){
    getSearchAsset('asset_code',$(this).val());
});

function getSearchAsset(type,text){
    
    if(type=='asset_code'){
        SearchAsset = type;
    }else{
        SearchAsset = '';
    }
    
    
    $.post( "./SearchAsset",{type_asset_id:$('#type_asset_id').val(),nature_asset_id:$('#nature_asset_id').val(),division_id:$('#division_id').val(),institution_id:$('#institution_id').val(),type:type,text:text}, function(response) {
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
                    //alert(value['chRequest']);
                    if(value['chRequest']==null){
                        dataRows += '<button type="button" class="btn btn-success btn-xs bTransfer" stock-id="'+value['stock_id']+'">ขอโอน</button>';
                    }else{
                        dataRows += '<button type="button" class="btn btn-danger btn-xs bUnTransfer" transfer-id="">ยกเลิก</button>';
                    }
                    dataRows += '</td>';
                dataRows += '</tr>';
            });
        }
        
        $('#ShowList').html(dataRows);
        
        
    });
    
}


$('#ShowList').on('click','.bTransfer',function(){
    //alert();
    if(confirm('ยืนยันการขอโอน/ย้ายครุภัณฑ์')){
        $.post( "./AddRequest",{stockId:$(this).attr('stock-id')}, function(response) {
            if(response=='ok'){
                alert('ยืนยันการขอโอน/ย้ายครุภัณฑ์ เรียบร้อย');
            }
            
            if(SearchAsset=='asset_code'){
                getSearchAsset('asset_code',$(this).val());
            }else{
                getSearchAsset('','');
            }
            
        });
    }
});


$('#ShowList').on('click','.bUnTransfer',function(){
    //alert();
    if(confirm('ยืนยันการยกเลิกการขอโอน/ย้ายครุภัณฑ์')){
        $.post( "./DelRequest",{transferId:$(this).attr('transfer-id')}, function(response) {
            if(response=='ok'){
                alert('ยกเลิกการขอโอน/ย้ายครุภัณฑ์ เรียบร้อย');
            }
            
            if(SearchAsset=='asset_code'){
                getSearchAsset('asset_code',$(this).val());
            }else{
                getSearchAsset('','');
            }
        });
    }
});










