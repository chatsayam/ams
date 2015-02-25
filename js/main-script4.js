/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var noti = '0';

(function loopNotifications() {
    setTimeout(function () {
        $.ajax({
            url: '../Stock/NotificationType4',
            success: function (response) {
                // do something with the response

                if (response !== noti) {
                    $('#maessage-noti').html(response);
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