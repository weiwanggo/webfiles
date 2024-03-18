<?php
$current_dir = dirname(__FILE__);


$whitelisted_ips = file('/home/bitnami/allowed_ips.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$msg_english = "<p>Dear lovely friends, Our website's traffic demand has been off the charts, and our old servers just can't keep up! That's why we're busy moving to a new home. So, please bear with us as we're in the midst of this bustling relocation! New website is coming soon! </p>";
$msg_english .= "<p>Thank you for your understanding and support!</p>";

$msg_chinese = "<p>小伙伴们， 我们的网站流量需求太火爆啦，老服务器已经不堪重负! 请大家稍安勿躁，新服正在紧锣密鼓地建设中。 感谢您的理解和支持！</p>";

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
     echo 'Access denied:'. $client_ip . ' !';
?>
<html>
<p>Hi 海哲宝宝们！
<p>感谢大家对网站的支持，虽然“略有”拥堵，但我们已经成功度过了第一天！现在，是时候进行系统维护啦，网站可能会暂时无法浏览。 还有很多小伙伴未能成功订阅，别着急，我们
的超级IT小分队正在全力以赴，以最快的速度修复问题。 有任何问题或反馈，请联系我们。
<p>感谢您的耐心与支持，让我们一起期待网站尽快重现活力！
<br/>
<p>Hi Jellyfish！
<p>Thank you all for your support to the website. Although we've experienced a "slight" congestion, we've successfully passed the first day! Now, it's time for some system maintenance, and the website may temporarily be unavailable. We understand that there are still many buddies who haven't been able to subscribe successfully. Don't worry, our super IT squad is working tirelessly to fix the issues as quickly as possible. If you have any questions or feedback, please feel free to contact us.
<p>Thank you for your patience and support, let's look forward to the website's return soon together!
</html> <?php
      exit; // Stop further execution
}

