/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var App = angular.module('myApp', []);

App.controller('addStock', function ($scope, $http) {
    
    $scope.addLocalStorage = function () {
        console.log('aaa');
        //var data = $scope.st;
        
        //console.log(data.serializeArray());
        console.log($scope.st);
        console.log(JSON.stringify($scope.st));
        localStorage.setItem('stockData', JSON.stringify($scope.st));
        //$scope.st = localStorage.getItem('stockData');
    };
    //$scope.st = {"register_code": "dddd"};
    if(localStorage.getItem('stockData') != null){
        /* ถ้ามีแล้ว ให้กรอกข้อมูลลงในฟอร์ม โดยใช้ค่าจาก localStorage */
        console.log(localStorage.getItem('stockData'));
        $scope.st = JSON.parse(localStorage.getItem('stockData'));
        //fillForm(JSON.parse(localStorage.getItem('stockData')));
        //localStorage.removeItem('stockData');
    }
    
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

jQuery(function ($) {
    $('#tabbedwizard').wizard().on('finished', function (e) {
        Notify('ขอบคุณ! การจัดการข้อมูลของคุณครบถ้วนแล้ว successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
    });
});

$('#txtDetail').wysihtml5();

/*
 $(function () {
 $('#file_pd018').uploadify({
 'formData': {
 'timestamp': $('#timeStamp').val(),
 'token'     : $('#unique_salt').val()
 },
 'swf': '../../assets/layout/assets/uploadify.swf',
 'uploader': 'SpecUploadify'
 });
 
 $('#buy_file_upload').uploadify({
 'formData': {
 'timestamp': $('#timeStamp').val(),
 'token'     : $('#unique_salt').val()
 },
 'swf': '../../assets/layout/assets/uploadify.swf',
 'uploader': 'SpecUploadify'
 });
 });
 */

$(function () {
    /*
    var fillForm = function(data){
        $.each(data, function(i, field) {
            console.log(i+'='+field);
            $('#'+i+'').val(field);
        });
    };
    */
    
    

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
                // on success do some validation or refresh the content div to display the uploaded images 
                //jQuery("#list-of-post").load("<?php echo Yii::app()->createUrl('//forumPost/forumPostDisplay'); ?>");
                console.log(data);
            },
            complete: function () {
                // success alerts
            },
            error: function (data) {
                alert("There may a error on uploading. Try again later");
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });

});
