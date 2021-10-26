<?php

/**
 * @file
 * Testing login in wordpress with api wordpress
 */

    curl_init();

    $url = 'https://pibble.co/wp-json/jwt-auth/v1/token';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS , array(
        'username' => 'USERNAME_HERE',
        'password' => 'PASSWORD_HERE'
    ));
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
?>