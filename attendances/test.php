<?php
/**
 * Created by PhpStorm.
 * User: Collins
 * Date: 10/09/2018
 * Time: 5:22 PM
 */

function RandomString($length = 32) {
    $randstr = '';
    srand((double) microtime(TRUE) * 1000000);
    //our array add all letters and numbers if you wish
    $chars = array(
        '0','1','2','3','4','5','6','7','8','9');
    $chars2 = array(
        'a', 'b', 'c','d', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
        'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
    );

    for ($rand = 0; $rand <= $length; $rand++) {
        $random = rand(0, count($chars) - 1);
        $random2 = rand(0, count($chars2) - 1);
        $randstr .= $chars[$random].$chars2[$random2];
    }
    return $randstr;
}

echo RandomString (6);

echo "<br>" .uniqid();