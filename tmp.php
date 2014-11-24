<?php
$im      = isset($_GET['im']) ? $_GET['im'] : 'NO_IMAGE';
$maxsize = isset($_GET['ms']) ? $_GET['ms'] : '100';   
            


// The file
$filename = $im;

// Set a maximum height and width
$width  = $maxsize;
$height = $maxsize;

// Content type
header('Content-type: image/jpeg');

// Get new dimensions
list($width_orig, $height_orig) = getimagesize($filename);

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