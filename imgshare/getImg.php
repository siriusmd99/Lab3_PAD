<?php
error_reporting(0);
require_once('includes/db_init.php');

if (!isset($result)) 
    $result = new stdClass();

$id;
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
}
else
{
	$result->status = "Error";
	$result->msg = "Image id not Specified";

	echo json_encode($result,JSON_PRETTY_PRINT);
	exit();
}

try {
	    $safe_id = $db_conn->real_escape_string($id);
	    $query = "SELECT * FROM images WHERE id='{$safe_id}'";
		$res = $db_conn->query($query);
		
		if (!$res || $res->num_rows == 0) 
		{ 
			$result->status = "Error";
			$result->msg = "No image with such id found in database.";

			echo json_encode($result,JSON_PRETTY_PRINT);
			exit();
		}
		else
		{
			$img_array=mysqli_fetch_array($res);
			
			$result->status = "Success";
			$result->id = $img_array['id'];
			$result->extension = $img_array['ext'];
			$result->image = base64_encode( $img_array['imagedata'] );

			echo json_encode($result,JSON_PRETTY_PRINT);
		    
		}

}
catch(Exception $e)
{
	$result->status = "Error";
	$result->msg = "There was a problem while retrieving your image. Try again later or use smaller sized image.";

	echo json_encode($result,JSON_PRETTY_PRINT);
}
	
?>