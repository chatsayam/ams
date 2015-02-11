/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var tdata;

var App = angular.module('myApp', []);

App.controller('mainController', function ($scope, $http) {
    
    $('button.btn-next').click(function(event){
       alert(2); 
    });
    
    $('button.btn-prev').click(function(event){
        alert(1);
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

jQuery(function ($) {
    $('#tabbedwizard').wizard().on('finished', function (e) {
        Notify('ขอบคุณ! การจัดการข้อมูลของคุณครบถ้วนแล้ว successfully.', 'bottom-right', '5000', 'blue', 'fa-check', true);
    });
});
