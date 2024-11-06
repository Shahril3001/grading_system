	
	<?php
	if(isset($_POST['Submit'])) 
	{
		$lecturerid=$_GET['lecturerid'];
		$role=$_GET['role'];
		$newlecturerdepartment=$_POST['newlecturerdepartment'];
		$newlectureremail=$_POST['newlectureremail'];
		$newlecturerpassword=$_POST['newlecturerpassword'];
		$newclecturerpassword=$_POST['newclecturerpassword'];
								
		if($newlecturerpassword==$newclecturerpassword){
		$target_dir = "data/img/lecturers/";
		$target_dir = $target_dir . basename( $_FILES["newlecturerimg"]["name"]);
		$uploadOk=1;

		if (file_exists($target_dir . $_FILES["newlecturerimg"]["name"])) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
		}
		if ($uploadOk==0) {
			echo "Sorry, your file was not uploaded.";
		} 
		else { 
			if (move_uploaded_file($_FILES["newlecturerimg"]["tmp_name"], $target_dir)) 
		{
			$imageup = $target_dir;
			echo "<img src='" . $imageup . "' />";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
		}
	
		$findlecturerid=$lecturerid;
		$xml = simplexml_load_file('data/lecturers.xml');
		$chalecturers = $xml->xpath('//lecturer[lecturerid="' . "$findlecturerid".'"]');
		foreach($chalecturers as $chalecturer) {
		$chalecturer->lecturerimg=$imageup;
		$chalecturer->lecturerdepartment=$newlecturerdepartment;
		$chalecturer->lectureremail=$newlectureremail;
		$chalecturer->lecturerpassword=$newlecturerpassword;
		}

		$xml->asXML('data/lecturers.xml');
		if ($xml === false)  {
		echo "<p id='invalid'>Update profile is not successful. Please try again.</p>";
		} 
		else {
		echo "<p id='valid'>Profile is successfully updated.</p>";
		header("location:index1.php?lecturerid=".$lecturerid."&role=".$role."");
		}
	}
	else{
	echo "<p id='invalid'>Sorry. Password and confirm password must be same value.</p>";
	}
	}
	?>