<?php
$current_dir = dirname(__FILE__);


$whitelisted_ips = file('/home/bitnami/allowed_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// Get the client's IP address
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    // If the X-Forwarded-For header exists, get the client IP address from it
    $client_ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $client_ip = trim(end($client_ips));
} else {
    // Otherwise, fall back to using REMOTE_ADDR
    $client_ip = $_SERVER['REMOTE_ADDR'];
}
$host = $_SERVER['HTTP_HOST'];

 // Check if the visitor's IP is in the whitelist
if ( empty($client_ip) || !in_array($client_ip, $whitelisted_ips)) {
      // IP is not whitelisted, block access
      //error_log("white_list_file:::::::::::::::::::::::::::::::::::::::" . $current_dir);
      //error_log("Access denied for " . $client_ip . " , it is not in allowed list " . implode(", ", $whitelisted_ips) . " !!!");	
     //echo 'Access denied:'. $client_ip . ' !';
     include 'maintenance.html';
     exit; // Stop further execution
}

