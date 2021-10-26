<?php

require 'class.noegomez.php';
$wp_user     = '';
$wp_password = '';

$conn = new NG($wp_user, $wp_password);

echo $conn->getPost(1);