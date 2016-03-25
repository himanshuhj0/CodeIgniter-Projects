<?php

session_start();
unset($_SESSION['security_code']);
$_SESSION['security_code'] = rand(1000, 9999);
header("Content-Type: image/png");
$im = @imagecreate(110, 20)
        or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 65, 40, 2, $_SESSION['security_code'], $text_color);
imagepng($im);
imagedestroy($im);
?>