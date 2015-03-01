/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var noti = '0';
var mes = '0';

$('#clk-con-message').click(function(){
    if(mes !== noti){
        clkmessage();
    }
});

function clkmessage(){
    $.ajax({
        url: '../Stock/ConMessage3',
        success: function (response) {
            $('#con-message').html(response);
            mes = noti;
        },
        error: function () {
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function Notification(){
    $.ajax({
        url: '../Stock/NotificationType3',
        success: function (response) {
            if (response !== noti) {
                $('#message-noti').html(response);
                noti = response;
            }
        },
        error: function () {
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

Notification();

(function loopNotifications() {
    setTimeout(function () {
        $.ajax({
            url: '../Stock/NotificationType3',
            success: function (response) {
                // do something with the response

                if (response !== noti) {
                    $('#message-noti').html(response);
                    noti = response;
                    Notify('การแจ้งเตือนมีการเปลี่ยนแปลง.', 'bottom-right', '5000', 'blue', 'fa-check', true);
                }

                loopNotifications(); // recurse
            },
            error: function () {
                // do some error handling.  you
                // should probably adjust the timeout
                // here.

                //loopNotifications(); // recurse, if you'd like.
            },
            cache: false,
            contentType: false,
            processData: false
        });
    }, 10000);
})();