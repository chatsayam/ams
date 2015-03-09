var App = angular.module('myApp', []);
App.controller('mainController', function($scope, $http) {

});

function GetListRepair(){
    $.post("../GetListRepair", {id: $('#idStock').val()}, function(response) {
        var dataRows = '';
        if (response != '[]') {
            $.each($.parseJSON(response), function(index, value) {
                dataRows += '<tr>';
                    dataRows += '<td>';
                    dataRows += (index + 1);
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['date_repair'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['repair'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['price_repair'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += value['repair_orther'];
                    dataRows += '</td>';
                    dataRows += '<td>';
                    dataRows += '<button type="button" class="btn btn-info btn-xs bOpenFile" file="'+value['file_repair_invoice']+'">เรียกดู</button>';
                    //dataRows += value['file_repair_invoice'];
                    dataRows += '</td>';
                dataRows += '</tr>';
            });
        }

        $('#ShowList').html(dataRows);
    });
}

GetListRepair();


$('#bShowInput').click(function(){
    $('#myInput').modal('show');
    $('.rep').val('');
});

$('#file_repair').change(function () {
    var formData = new FormData($("#frm_file_repair")[0]);
    console.log(formData);
    $.ajax({
        url: '../RepairUpload',
        type: 'POST',
        data: formData,
        datatype: 'json',
        // async: false,
        beforeSend: function () {
            // do some loading options
        },
        success: function (data) {
            if (data == 'noPDF') {
                alert('เอกสารที่อัพโหลดไม่ใช่ไฟล์ PDF');
            } else if (data == 'noUpload') {
                alert('เกิดปัญหาระหว่างการอัพโหลด กรุณาอัพโหลดเอกสารใหม่');
            } else {
                $('#file_repair_invoice').val(data);
                alert('การอัพโหลดไฟล์สำเร็จ');
            }
        },
        complete: function () {
            // success alerts
            //alert('การอัพโหลดไฟล์สำเร็จ');
        },
        error: function (data) {
            alert("การอัพโหลดเอกสารมีข้อผิดพลาดกรุณาอัพโหลดใหม่อีกครั้ง");
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;
});

$('#bSave').click(function(){
    $.post("../SaveRepair", {data:{date_repair:$('#date_repair').val(),price_repair:$('#price_repair').val(),repair:$('#repair').val(),repair_orther:$('#repair_orther').val(),file_repair_invoice:$('#file_repair_invoice').val(),idStock:$('#idStock').val()}}, function(response) {
        if(response=='ok'){
            GetListRepair();
            alert('บันทึกประวัติการแจ้งซ้อมเรียบร้อย');
            $('#myInput').modal('hide');
            
        }
    });
});


$('#ShowList').on('click','.bOpenFile', function(){
    var file = $(this).attr('data-src');
    console.log(file);

    //window.popup('./OpenFilePDF?fileData='+file);
    window.open( "../OpenFilePDF?fileData="+$(this).attr('file'), "myWindow",  "status = 1, height = 650, width = 950, resizable = 0" );
    return false;

});





