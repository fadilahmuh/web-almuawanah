/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";
function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    var mytime=setTimeout('display_ct()',refresh)
}
    
function display_ct() {
    var x = new Date()
    var x1=x.toUTCString();// changing the display to UTC string
    // document.getElementById('datetime').innerHTML = x1;
    $('#datetime').html(x1);
    var tt=display_c();
}

$(".inputtags").tagsinput('items');

