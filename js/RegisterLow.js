/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).off('.tab.data-api');


var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    
    $scope.openReport = function () {
        window.open("./ReportPD591", "myWindow", "status = 1, height = 650, width = 1024, resizable = 0");

    };
    
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
    };$scope.selectVendor = function () {
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
    
    function saveRegisterLow(){
        $.post('./SaveRegisterLow', {
            data: $scope.st,
            fp: $scope.fp
        }, function (data) {
            
        });
    }


    function checkPageTab(valPage, cEvent) {
        if (cEvent === "next") {
            idAreaActive2 = $('#' + valPage).next().attr('id');
        } else if (cEvent === "prev") {
            idAreaActive2 = $('#' + valPage).prev().attr('id');
        }

        if (idAreaActive2 === 'tabBudget') {
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabPurchasing') {
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabSeller') {
            LvMyTab = 2;
            $('#bNext').show();
            $('#bPrevious').show();
        } else if (idAreaActive2 === 'tabDetail') {
            $('#bNext').show();
            $('#bPrevious').show();
            $('#bNext').removeClass('btn-success');
            $('#bNext').addClass('btn-info');
            $('#bNext').text('เสร็จสิ้น');
        } else if (idAreaActive2 === 'tabRegiter') {
            if(confirm('ยืนยันการบันทึกข้อมูล')){
                $('#bNext').removeClass('btn-info');
                $('#bNext').addClass('btn-success');
                $('#bNext').text('จบ');
                $('#bPrevious').hide();
                $('#mytab .active').next().find('a').tab('show');
                
                saveRegisterLow();
                
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
                //window.location = "addstockpd44";
                alert('end');
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