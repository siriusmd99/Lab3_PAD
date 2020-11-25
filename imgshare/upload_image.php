<?php
error_reporting(1);
require_once('includes/db_init.php');
require('includes/static_util.php');

$tmp_location = $_FILES['file']['tmp_name'];
$image= $_FILES['file']['name'];


if (!isset($result)) 
    $result = new stdClass();

try {
	if( $imagetype = exif_imagetype($tmp_location)) 
	{
		
		$img_bytes = file_get_contents($tmp_location);
		$imgname = bin2hex(random_bytes($config['imgshare_uidlen']));
	   
	   
	    $safe_imgname = $db_conn->real_escape_string($imgname);
		$safe_imgbytes = $db_conn->real_escape_string($img_bytes);
		$safe_ext = $db_conn->real_escape_string(image_type_to_extension($imagetype, true));
		
    	$query = "INSERT INTO `images` ( `id`, `imagedata`, `ext`) VALUES ('{$safe_imgname}', '{$safe_imgbytes}', '{$safe_ext}')";
		if (!$db_conn->query($query)) 
		{ 
			$result->status = "Error";
			$result->msg = "Couldn't import image to database.";

			echo json_encode($result);
		}
		else
		{
			$result->status = "Success";
			
			$result->msg = localURL()."showImg.php?id=".$imgname;

			echo json_encode($result,JSON_UNESCAPED_SLASHES);
		}
	}
	else
	{
		$result->status = "Error";
		$result->msg = "Unsupported Image Format.";

		echo json_encode($result);
	}
}
catch(Exception $e)
{
	$result->status = "Error";
	$result->msg =$e;// "There was a problem uploading your image. Try again later or use smaller sized image.";

	echo json_encode($result);
}
	
?>
