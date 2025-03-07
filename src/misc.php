<?php
function watermark_image($id, $type)
{
	$image = null;

	if ($type == ".jpg") {
		$image = imagecreatefromjpeg("images/{$id}/original{$type}");
	} else {
		$image = imagecreatefrompng("images/{$id}/original{$type}");
	}

	list($width, $height) = getimagesize("images/$id/original{$type}");
	$watermark = htmlspecialchars($_POST["watermark"]);

	$text_bounding_box = imagettfbbox(50, 0, "fonts/OpenSans-Regular.ttf", $watermark);

	$txt_colour = imagecolorexactalpha($image, 255, 255, 255, 60);
	imagettftext($image, 50, 0, ($width - $text_bounding_box[4]) / 2, ($height - $text_bounding_box[5]) / 2, $txt_colour, "fonts/OpenSans-Regular.ttf", $watermark);

	if ($type == ".jpg") {
		imagejpeg($image, "images/{$id}/watermarked{$type}");
	} else {
		imagepng($image, "images/{$id}/watermarked{$type}");
	}

	$thumbnail = imagecreatetruecolor(200, 125);

	imagecopyresized($thumbnail, $image, 0, 0, 0, 0, 200, 125, $width, $height);

	if ($type == ".jpg") {
		imagejpeg($thumbnail, "images/{$id}/thumbnail{$type}");
	} else {
		imagepng($thumbnail, "images/{$id}/thumbnail{$type}");
	}

	imagedestroy($image);
	imagedestroy($thumbnail);
}