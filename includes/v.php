<?php
//this function is a special brew of the imagettftext() function with a "stroke" effect
function imagettftextoutline(&$im,$size,$angle,$x,$y,&$col,
            &$outlinecol,$fontfile,$text,$width) {
 
    for ($xc=$x-abs($width);$xc<=$x+abs($width);$xc++) {
 
        for ($yc=$y-abs($width);$yc<=$y+abs($width);$yc++) {
 
            $text1 = imagettftext($im,$size,$angle,$xc,$yc,-$outlinecol,$fontfile,$text);
        }
    }
    // Draw the main text
    $text2 = imagettftext($im,$size,$angle,$x,$y,-$col,$fontfile,$text);
}
header( "Content-type: image/png" ); //tells the browser that the content is a PNG file
 
$font = "volterb.ttf"; //specify font
 
//these are the attributes
$text = htmlspecialchars($_GET["t"]);
$fontsize = $_GET["s"];
$width = $_GET["w"];

$filePath = $text . "-" . $fontize . "-" . $width . ".png";
$cachePath = "./cache/";
if (file_exists($cachePath . $filePath)) {
        $fileOpen = fopen($cachePath . $filePath, "r");
        fpassthru($fileOpen);
        exit;
}
 
//determine how many pixels (x and y) the text will take up
$size = imagettfbbox($fontsize, 0, $font, $text);
//then use those to determine the appropriate size of the image
$x = (abs($size[0] - $size[2])) + ($width*3);
$y = (abs($size[1] - $size[5])) + ($width*3);
 
//create the image and add a whitish background that is later removed
$im = imagecreatetruecolor($x, $y);
imageantialias($im, false);
$transparent = imagecolorallocatealpha($im, 255, 255, 255, 125);
imagefill($im, 0, 0, $transparent);
imagecolortransparent($im, $transparent); //set the whitish background to transparent
 
//determine the appropriate coordinates for the baseline of the font
$left = $size[0] + ($width*2);
$bottom = ($width*2) + $fontsize;
 
$white = imagecolorallocate( $im, 0xFF, 0xFF, 0xFF ); //font fill color
//$out = imagecolorallocatealpha( $im, 0x00, 0x00, 0x00, 40 );
$out = imagecolorallocatealpha( $im, 0, 0, 0, 90 );
imagesavealpha($im, true);

imagettftextoutline($im,$fontsize,0,$left,$bottom,$white,$out,$font,$text,$width); //create text
 
imagepng( $im ); //create a png image
imagepng( $im, $cachePath . $filePath ); //create a png image and save it for future caching
imagedestroy( $im ); //clear the image from memory
?>