<?php
$ID = '63cd9c3e730a1';
$file_name='Certificate.png';
require 'config.php';
$sql="SELECT `First_Name`, `Middle_Name`, `Last_Name` FROM `users` WHERE `ID` = '$ID' AND `ProfilePicture` = 1";
foreach($dbo->query($sql) as $row ){
$img_source=imagecreatefrompng($file_name);

$whiteColor=imagecolorallocate($img_source,255,255,255);
$nameColor=imagecolorallocate($img_source,226,190,118);


list($img_width, $img_height,,) = getimagesize('Certificate.png');

$font ='GreatVibes-Regular.ttf';
$text = $row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'];
$font_size = 100; 
$txt_max_width = intval(0.5 * $img_width);    
$txt_max_height = intval(0.08 * $img_width);    

do {        
    $font_size++;
    $p = imagettfbbox($font_size, 0, $font, $text);
    $txt_width = $p[2] - $p[0];
    $txt_height=$p[1]-$p[7]; // just in case you need it
} while ($txt_width <= $txt_max_width && $txt_height <= $txt_max_height);
echo $font_size."\n"; 
$y = $img_height * 0.57;
$x = ($img_width - $txt_width) / 2;

imagettftext($img_source, $font_size, 0, $x, $y, $nameColor, $font, $text);

$x=552;
$y=1100;
$today=new DateTime;
$str_date=$today->format('d-m-Y');
$font ='Poppins-MediumItalic.ttf';
imagettftext($img_source, 28,0,$x,$y,$whiteColor, $font, $str_date);

// adding QR code

// $QR=imagecreatefromstring(file_get_contents(
//   "https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl="
//   .urlencode($row['id'])));
// imagecopyresampled($img_source, $QR, 1700, 1100 , 0, 0, 150, 150, 150,150);

// add profile picture

$file = "../images/thumbnail/".$ID."_0.jpg";
$size = getimagesize($file);
$im = imagecreatefromjpeg($file);

$w = 262;
$h = $w * $size[1] / $size[0];

imagecopyresampled($img_source, $im, 232,212,0,0, $w,$h,$size[0],$size[1]);

// add stamp 
$str=imagecreatefrompng("stamp.png");
$stampSize = getimagesize("stamp.png");
$w = 120;
$h = $w * $stampSize[1] / $stampSize[0];
imagecopyresampled($img_source, $str, 420, 392,0,0, $w,$h,$stampSize[0],$stampSize[1]);
////
imagejpeg($img_source,"Membership/".$ID."_Certificate.jpg");
imagedestroy($img_source);
echo '200 Ok';
}
?>
