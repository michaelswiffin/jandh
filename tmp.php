<?php
$im      = isset($_GET['im']) ? $_GET['im'] : 'NO_IMAGE';
            
// The file
$filename = $im;

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

$maxsize = isset($_GET['ms']) ? $_GET['ms'] : $width_orig;   

// Set a maximum height and width
$height = $maxsize;
$width  = $maxsize;	
// Content type
header('Content-type: image/jpeg');


if ($width && ($width_orig < $height_orig)) {
	$width = ($height / $height_orig) * $width_orig;
} else {
	$height = ($width / $width_orig) * $height_orig;
}

// Resample
$image_p = imagecreatetruecolor($width, $height);
$image   = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Output
imagejpeg($image_p);
imagedestroy($image);
imageDestroy($image_p);


?>