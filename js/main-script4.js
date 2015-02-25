/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function loopNotifications(){
   setTimeout(function(){
       $.ajax({
           url: '../Stock/NotificationType4',
           success: function( response ){
               // do something with the response

               loopNotifications(); // recurse
           },
           error: function(){
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