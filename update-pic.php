<?php
	session_start();

	// display errors for debugging purposes
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);

	/* NOTE: Should download and install (if not installed) php7.0-gd (for Ubuntu 16.04) 
	on server, before using this php file. The extension php_gd2.dll is needed for 
	imagecreatetruecolor method used below */

	$post = isset($_POST) ? $_POST : array();

	switch($post['action'])
	{
		case 'save':
		saveProfilePic();
		saveProfilePicTmp();
		break;

		default:
		changeProfilePic();
	}

	/* change profile pic */
	function changeProfilePic()
	{
		$post = isset($_POST) ? $_POST : array();

		// set max width of preview image before cropping
		$max_width = 300;

		// path of profile images directory
		$path = 'imgs/profile';

		// supported image formats
		$valid_formats = array("jpg", "png", "jpeg");
		
		// retrieve name and size of file
		$name = $_FILES['profile-pic']['name'];
		$size = $_FILES['profile-pic']['size'];

		// retrieve current user's id
		$uid = $_SESSION["uid"];

		if(strlen($name))
		{
			// retrieve extension of image
			$ext = pathinfo($name, PATHINFO_EXTENSION);
			
			// check if image is in supported format
			if(in_array($ext, $valid_formats))
			{
				// check if image is <= 1MB
				if($size < (1024*1024))
				{
					// rename image with prefix 'avatar' followed by user id
					$actual_image_name = 'avatar' . '_' . $uid . '_tmp' . '.' . $ext;

					// get full path of image on server
					$image_path = $path . '/' . $actual_image_name;
					
					$tmp = $_FILES['profile-pic']['tmp_name'];

					// move image to server
					if(move_uploaded_file($tmp, $image_path))
					{
						$width = getWidth($image_path);
						$height = getHeight($image_path);

						// proportionally scale image if it is > max_width set above
						if($width > $max_width)
						{
							$scale = $max_width/$width;
							$uploaded = resizeImage($image_path, $width, $height, $scale, $ext);
						}
						else
						{
							$scale = 1;
							$uploaded = resizeImage($image_path, $width, $height, $scale, $ext);
						}
						echo "<img id=\"photo\" file-name=\"$actual_image_name\" src=\"$image_path\" class=\"preview\" />";
					}
					else echo "Upload failed!";
				}
				else echo "Image file size max 1 MB!";
			}
			else echo "Invalid file format!";
		}
		else echo "Please select image!";
		exit;
	}

	/* save profile image path to db */
	function saveProfilePic()
	{
		// retrieve vars from session array
		$uid = $_SESSION["uid"];

		$image_path = $_POST["save_path"];

		// for debugging
		// error_log("$image_path",3,"/var/www/html/error.log");

		// modify name
		list($name,$ext) = explode(".",$image_path);
		$image_path = $name . '.jpg';

		// connect to db
		include('mysql-conn.php');

	  	// update user's profile pic
   	 	$sql = "UPDATE User SET profilePic='$image_path' WHERE userID = '$uid';";

	    // run query
	    $query = $conn->query($sql);

	    // debugging
	    if(!$query)
	    	echo "query failed...";
	}

	/* crop, resize and replace original image on server */
	function saveProfilePicTmp()
	{
		// dimensions of profile picture
		$crop_width = 100;
		$crop_height = 100;
		$ext;

		if(isset($_POST['t']) and $_POST['t'] == "ajax")
		{
			// extract vars from post array and represent each with respective key
			extract($_POST);

			// Get image extension
			$ext = pathinfo($image_path, PATHINFO_EXTENSION);

			// debugging using a log file - need to give read and write permissions to log file before hand
			// error_log("$ext",3,"/var/www/html/error.log");

			// create new image for profile
			$nimg = imagecreatetruecolor($crop_width, $crop_height);

			// obtain reference to original image as jpg - png and gif will be converted to jpg
			$im_src = imagecreatefromjpeg($image_path);

			// crop image to user specifications
			imagecopyresampled($nimg, $im_src, 0, 0, $x1, $y1, $crop_width, $crop_height, $w1, $h1);

			// create profile image, replacing original
			header('Content-Type: image/jpeg');		// set MIME type
			
			// save all profile images in jpg format
			if(strcmp($ext, "png") == 0)
				$new_path = str_replace("png", "jpg", $save_path);
			else
				$new_path = $save_path;

			// for debugging
			//error_log("$new_path",3,"/var/www/html/error.log");

			// save image
			imagejpeg($nimg, $new_path, 90);
			
			// free up memory after done
			imagedestroy($nimg);
		}
		echo $new_path;

		// remove temp uploaded image 
		unlink($image_path);
	}

	/* resize image for preview */
	function resizeImage($image, $width, $height, $scale, $ext)
	{
		$newImageWidth = ceil($width * $scale);
		$newImageHeight = ceil($height * $scale);
		$newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);

		switch($ext)
		{
			case 'jpg':
			case 'jpeg':
			$source = imagecreatefromjpeg($image);
			break;

			case 'png':
			$source = imagecreatefrompng($image);
			break;

			default:
			$source = false;
		}

		imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $width, $height);
		imagejpeg($newImage, $image, 90);
		chmod($image, 0777);
		return $image;
	}

	// get image width
	function getWidth($image)
	{
		$sizes = getimagesize($image);
		$width = $sizes[0];
		return $width;
	}

	// get image height
	function getHeight($image)
	{
		$sizes = getimagesize($image);
		$height = $sizes[1];
		return $height;
	}
?>