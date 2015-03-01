/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).off('.tab.data-api');

var tdata;

var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    function addkey(){
        $.post('./KeyRunAsset',{},function(data){
            $('#register_code').val(data);
            //$('#register_code').removeAttr('ng-invalid');
        });
    }
    
    addkey();

    $scope.st = '';

    $scope.addLocalStorage = function () {
        console.log($scope.st);
        var arr = $scope.st;
        console.log(JSON.stringify($scope.st));
        localStorage.setItem('assetData', JSON.stringify(arr));
        //$scope.st = localStorage.getItem('assetData');
    };

    $scope.addDetailStorage = function(){
        localStorage.setItem('DetailComment', JSON.stringify($scope.dt));
    };
    
    $scope.showDetail = function(){
        
        $http.get('./ShowDataDetail').success(function (data) {
            $('#showListDetail').html(data);
        });
    };
    
    $scope.editDataRegister = function(){
        
        window.location.href = './Register?EDIT=EDIT';
    };
    


    $scope.openReport = function () {
        window.open("./ReportOnePagePD44", "myWindow", "status = 1, height = 650, width = 1024, resizable = 0");

    };

    $scope.exportPDF = function () {
        window.open('ReportOnePagePD44TOPDF');
    };

    $scope.saveStockData = function () {
        $.ajax({
            url: './SaveAsDataStockRegister',
            type: "POST",
            data: {
                data: {machine_code: $('#machine_code').val(),
                    tb_status_status: $('#tb_status_status').val(),
                    work: $('#work').val(),
                    gfmis_code: $('#gfmis_code').val(),
                    base_in: $('#base_in').val()}
            }
        }).done(function (data) {
            //console.log(data);
            ShowListDataStock();
        });
    };

    function ShowListDataStock() {

        $http.get('./ShowListDataStock').success(function (data) {
            $scope.listDataStock = data;
        });
    }
    
    function saveComment(){
        $.ajax({
            url: './SaveAsCommentRegister',
            type: "POST",
            data: {
                data: $('#txtDetail').val()
            }
        }).done(function (data) {
            //console.log(data);
        });
    }

    $('#showDataStock').on('click', '.RemoveDataListStock', function () {
        var id = $(this).attr('data-remove');
        console.log(id);

        $.ajax({
            url: './RemoveDataStockRegister',
            type: "POST",
            data: {
                data: id
            }
        }).done(function (data) {
            //console.log(data);
            ShowListDataStock();
        });

    });


    $('#showDataFile').on('click', '.dataFile', function () {
        var file = $(this).attr('data-src');
        console.log(file);

        //window.popup('./OpenFilePDF?fileData='+file);
        window.open("./OpenFilePDF?fileData=" + file, "myWindow", "status = 1, height = 650, width = 1000, resizable = 0");
        return false;

    });

    function showListDataFile() {
        $http.get('./ShowListDataFile').success(function (data) {
            $scope.listDataFile = data;
        });
    }





    ////=======Upload===========================================================
    ////////////////////////////////////////////////////////////////////////pd01
    $('#file_pd01').change(function () {
        var formData = new FormData($("#frm_file_pd01")[0]);
        console.log(formData);
        $.ajax({
            url: './PD01Upload',
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
                    tdata = '{"file_pd01_name":"' + data + '"}';
                    console.log(tdata);
                    $scope.fl = JSON.parse(tdata);
                    localStorage.setItem('assetDataFlPD01', tdata);
                    console.log(data);
                    $('#file_pd01_name').removeClass('ng-invalid');
                    console.log($scope.fl);
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
    ////////////////////////////////////////////////////////////////////////pd38
    $('#file_pd38').change(function () {
        var formData = new FormData($("#frm_file_pd38")[0]);
        console.log(formData);
        $.ajax({
            url: './PD38Upload',
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
                    tdata = '{"file_pd38_name":"' + data + '"}';
                    console.log(tdata);
                    $scope.fm = JSON.parse(tdata);
                    localStorage.setItem('assetDataFlPD38', tdata);
                    $('#file_pd38_name').removeClass('ng-invalid');
                    console.log(data);
                    console.log($scope.fm);
                    alert('การอัพโหลดไฟล์สำเร็จ');
                }
            },
            complete: function () {
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
    ////////////////////////////////////////////////////////////////////////spec
    $('#file_spec').change(function () {
        var formData = new FormData($("#frm_file_spec")[0]);
        console.log(formData);
        $.ajax({
            url: './SpecUpload',
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
                    tdata = '{"file_spec_name":"' + data + '"}';
                    console.log(tdata);
                    $scope.fn = JSON.parse(tdata);
                    localStorage.setItem('assetDataFlSpec', tdata);
                    $('#file_spec_name').removeClass('ng-invalid');
                    console.log(data);
                    console.log($scope.fn);
                    alert('การอัพโหลดไฟล์สำเร็จ');
                }
            },
            complete: function () {
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
    /////////////////////////////////////////////////////////////////////invoice
    $('#file_invoice').change(function () {
        var formData = new FormData($("#frm_file_invoice")[0]);
        console.log(formData);
        $.ajax({
            url: './InvoiceUpload',
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
                    console.log(data);
                } else if (data == 'noUpload') {
                    alert('เกิดปัญหาระหว่างการอัพโหลด กรุณาอัพโหลดเอกสารใหม่');
                } else {
                    tdata = '{"file_invoice_name":"' + data + '"}';
                    console.log(tdata);
                    $scope.fo = JSON.parse(tdata);
                    localStorage.setItem('assetDataFlinvoice', tdata);
                    $('#file_invoice_name').removeClass('ng-invalid');
                    console.log(data);
                    console.log($scope.fo);
                    alert('การอัพโหลดไฟล์สำเร็จ');
                }
            },
            complete: function () {
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

    $scope.selectVendor = function () {
        $.post('./SelectVendors', {sup: $('#vendors_id').val()}, function (data) {
            $('#listVendors').html(data);
        });
    };

    $scope.filVendeor = function () {
        $.post('./FilVendor', {data: $('#vendors_id').val()}, function (data) {
            console.log(data);
            if (data !== '[]') {
                var obj = JSON.parse(data);
                console.log(obj);
                console.log(obj[0]['vendors_id']);
                tdata = "{\"tb_vendors_vendors_id\":\"" + obj[0]['vendors_id'] + "\"}";
                $scope.fp = JSON.parse(tdata);
                localStorage.setItem('assetDataVendors_id', tdata);
                tdata = 'เลขรหัสผู้เสียภาษี : ' + obj[0]['supply_code'] + '\n';
                tdata += 'รหัสในระบบ GFMIS : ' + obj[0]['supply_gfmis'] + '\n';
                tdata += obj[0]['supply'] + '\n';
                tdata += 'ที่อยู่ : ' + obj[0]['supply_address'] + '\n';
                tdata += 'เบอร์โทร : ' + obj[0]['supply_tel'] + '\n';
                $('#vendors').val(tdata);
                localStorage.setItem('assetDataVendors', tdata);
                localStorage.setItem('assetDataVendors_s', $('#vendors_id').val());
                console.log('s=' + $('#vendors_id').val());
            }
        });
    };

    function sendDataTOSaveAsset() {
        var dataStockAsset = $scope.st;
        var fl = $scope.fl;
        var fm = $scope.fm;
        var fn = $scope.fn;
        var fo = $scope.fo;
        var fp = $scope.fp;

        //console.log(JSON.stringify(fp));

        $.ajax({
            url: './SaveAsDataAssetRegister',
            type: "POST",
            data: {
                data: dataStockAsset,
                fl: fl,
                fm: fm,
                fn: fn,
                fo: fo,
                fp: fp,
                key : $('#register_code').val()
            }
        }).done(function (data) {
            //console.log(data);
        });

    }

    function checkPageTab(valPage, cEvent) {
        if (cEvent === "next") {
            idAreaActive2 = $('#' + valPage).next().attr('id');
        } else if (cEvent === "prev") {
            idAreaActive2 = $('#' + valPage).prev().attr('id');
        }

        if (idAreaActive2 === 'tabObject') {
            $('#bNext').show();
            $('#bPrevious').hide();
        } else if (idAreaActive2 === 'tabBudget') {
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabPurchasing') {
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabSeller') {
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabExaminer') {
            LvMyTab = 2;
            sendDataTOSaveAsset();
            $('#bNext').show();
            $('#bPrevious').hide();
        } else if (idAreaActive2 === 'tabDetail') {
            ShowListDataStock();
            saveComment();
            $('#bNext').show();
            $('#bPrevious').show();
            $('#bNext').removeClass('btn-success');
            $('#bNext').addClass('btn-info');
            $('#bNext').text('เสร็จสิ้น');
        } else if (idAreaActive2 === 'tabRegiter') {
            if (confirm('ขึ้นทะเบียนเพิ่มโดยการเปลียนแปลง specsification')) {
                localStorage.removeItem('assetDataFlSpec');
                //window.location = './Register';
                window.location = "Register";
            } else {
                showListDataFile();
                localStorage.clear();
                $('#bNext').removeClass('btn-info');
                $('#bNext').addClass('btn-success');
                $('#bNext').text('จบ');
                $('#bPrevious').hide();
                $('#mytab .active').next().find('a').tab('show');
            }

        }
    }

    //var LvMyTab = 2;
    var LvMyTab = 1;
    $('#bNext').click(function () {

        var idAreaActive = $('.tab-pane.active').attr('id');/*ดึง tab ที่ active*/
        var checkValue = '';
        checkValue = $('.tab-pane.active').find('.ng-invalid').attr('required');
        /*ดึงค่าตรวจจับฟอร์ม*/

        if (LvMyTab === 1) {
            if (checkValue === 'required' || checkValue === '') {/*-ถ้ากรอกแบบฟอร์มไม่ถูกต้อง-*/

                $('#alertText').hide(200);

                $('#alertText').show(200);
                console.log(checkValue);
                console.log(idAreaActive);
                checkValue = '';

            } else {
                $('#alertText').hide(200);
                console.log(checkValue);
                console.log(idAreaActive);
                checkValue = '';
                $('#mytab .active').next().find('a').tab('show');
                checkPageTab(idAreaActive, 'next');
            }

        } else if (LvMyTab === 2) {
            if (idAreaActive === "tabRegiter") {
                window.location = "../";
                alert('จบกระบวนการ การขอขึ้นทะเบียน');
            } else {
                checkPageTab(idAreaActive, 'next');
                $('#mytab .active').next().find('a').tab('show');
            }
        }


    });

    $('#bPrevious').click(function () {
        var idAreaActive = $('.tab-pane.active').attr('id');

        checkPageTab(idAreaActive, 'prev');
        $('#mytab .active').prev().find('a').tab('show');

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
    ////////////////////////////////////

    //////////////////////////////////////////////////////////////get local storage
    if (localStorage.getItem('assetData') !== null) {
        /* ถ้ามีแล้ว ให้กรอกข้อมูลลงในฟอร์ม โดยใช้ค่าจาก localStorage */
        console.log(localStorage.getItem('assetData'));
        $scope.st = JSON.parse(localStorage.getItem('assetData'));

        if ($scope.st['type_asset_id'] !== '') {
            console.log($scope.st['type_asset_id']);
            //alert(data);
            $("#type_asset_id").val($scope.st['type_asset_id']).attr('selected', true);
            $("#type_asset_id").trigger("chosen:updated");

            $.post('./ListNatureAsset', {
                id: $scope.st['type_asset_id']
            }, function (data) {
                var list = '<option value=""></option>';

                var obj = JSON.parse(data);
                $.each(obj, function (i, item) {
                    list += "<option value='" + obj[i].nature_asset_id + "'>" + obj[i].nature_asset + "</option>";

                });
                //listResult += '</ul>';
                $('#tb_nature_asset_nature_asset_id').html(list);
                //.$('#tb_nature_asset_nature_asset_id_chosen').find('.chosen-drop').html(listResult);
                if ($scope.st['tb_nature_asset_nature_asset_id'] !== '') {
                    //  natureName = obj[i].nature_asset;
                    $("#tb_nature_asset_nature_asset_id").val($scope.st['tb_nature_asset_nature_asset_id']).attr('selected', true);

                }
                $("#tb_nature_asset_nature_asset_id").trigger("chosen:updated");

                console.log(data);
            });
        }

        if ($scope.st['purchase_purchase_id'] !== '') {

            $("#tb_purchase_purchase_id").val($scope.st['tb_purchase_purchase_id']).attr('selected', true);
            $("#tb_purchase_purchase_id").trigger("chosen:updated");
        }

        if ($scope.st['tb_get_asset_get_asset_id'] !== '') {

            $("#tb_get_asset_get_asset_id").val($scope.st['tb_get_asset_get_asset_id']).attr('selected', true);
            $("#tb_get_asset_get_asset_id").trigger("chosen:updated");
        }

        if ($scope.st['tb_type_cost_type_cost_id'] !== '') {

            $("#tb_type_cost_type_cost_id").val($scope.st['tb_type_cost_type_cost_id']).attr('selected', true);
            $("#tb_type_cost_type_cost_id").trigger("chosen:updated");
        }

        if (localStorage.getItem('assetDataVendors_s') !== null) {

            //$('#vendors_id').val(localStorage.getItem('assetDataVendors_s'));
            console.log(localStorage.getItem('assetDataVendors_s'));
            $scope.fp = JSON.parse(localStorage.getItem('assetDataVendors_id'));
            $('#vendors').val(localStorage.getItem('assetDataVendors'));

        }


        //localStorage.removeItem('assetData');
    }


    /////===============get file was upload ================
    if (localStorage.getItem('assetDataFlPD01') !== null) {
        console.log(localStorage.getItem('assetDataFlPD01'));
        $scope.fl = JSON.parse(localStorage.getItem('assetDataFlPD01'));
        //localStorage.removeItem('assetDataFlPD01');
    } else {
        tdata = '{"file_pd01_name":""}';
        console.log(tdata);
        $scope.fl = JSON.parse(tdata);
    }

    if (localStorage.getItem('assetDataFlPD38') !== null) {
        console.log(localStorage.getItem('assetDataFlPD38'));
        $scope.fm = JSON.parse(localStorage.getItem('assetDataFlPD38'));
        //localStorage.removeItem('assetDataFlPD38');
    } else {
        tdata = '{"file_pd38_name":""}';
        console.log(tdata);
        $scope.fm = JSON.parse(tdata);
    }

    if (localStorage.getItem('assetDataFlSpec') !== null) {
        console.log(localStorage.getItem('assetDataFlSpec'));
        $scope.fn = JSON.parse(localStorage.getItem('assetDataFlSpec'));
        //localStorage.removeItem('assetDataFlSpec');
    } else {
        tdata = '{"file_spec_name":""}';
        console.log(tdata);
        $scope.fn = JSON.parse(tdata);
    }

    if (localStorage.getItem('assetDataFlinvoice') !== null) {
        console.log(localStorage.getItem('assetDataFlinvoice'));
        $scope.fo = JSON.parse(localStorage.getItem('assetDataFlinvoice'));
        //localStorage.removeItem('assetDataFlinvoice');
    } else {
        tdata = '{"file_invoice_name":""}';
        console.log(tdata);
        $scope.fo = JSON.parse(tdata);
    }
    
    if (localStorage.getItem('DetailComment') !== null) {
        console.log(localStorage.getItem('DetailComment'));
        $scope.dt = JSON.parse(localStorage.getItem('DetailComment'));
        //localStorage.removeItem('assetDataFlinvoice');
        //localStorage.setItem('DetailComment', JSON.stringify($scope.dt));
    } else {
        tdata = '{"detail":""}';
        console.log(tdata);
        $scope.dt = JSON.parse(tdata);
    }
    ///////////////////////////////////////////////////////////////////////////


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

//************************wysihtml5************************************//
$('#txtDetail').wysihtml5({
    "font-styles": false, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": false, //Button which allows you to edit the generated HTML. Default false
    "link": false, //Button to insert a link. Default true
    "image": false, //Button to insert an image. Default true,
    "color": false //Button to change color of font  
});
