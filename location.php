<?php

$img = imagecreatefromjpeg("map.jpg");
$red = imagecolorallocate($img, 255, 0, 0);

if( isset($_GET["x"]) && isset($_GET["y"]) ) {
  $x = $_GET["x"]/7.5;
  $y = $_GET["y"]/7.5;
  $x = $x + 400;
  $y = -($y - 400);
  
  imagefilledrectangle($img, $x, $y, $x+10, $y + 10, $red);
}

header ('Content-Type: image/png');
imagepng($img);
imagedestroy($img);