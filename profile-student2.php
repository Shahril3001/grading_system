<?php

	if(isset($_POST['Submit'])) 
								{
								$studentgroup=$_GET['studentgroup'];	
								$studentid=$_GET['studentid'];
								$role=$_GET['role'];
								$newstudentemail=$_POST['newstudentemail'];
								$newstudentpassword=$_POST['newstudentpassword'];
								$newcstudentpassword=$_POST['newcstudentpassword'];
								
								if($newstudentpassword==$newcstudentpassword){
								$target_dir = "data/img/students/";
								$target_dir = $target_dir . basename( $_FILES["newstudentimg"]["name"]);
								$uploadOk=1;

								if (file_exists($target_dir . $_FILES["newstudentimg"]["name"])) {
									echo "Sorry, file already exists.";
									$uploadOk = 0;
								}
								if ($uploadOk==0) {
									echo "Sorry, your file was not uploaded.";
								} 
								else { 
									if (move_uploaded_file($_FILES["newstudentimg"]["tmp_name"], $target_dir)) 
									{
										$imageup = $target_dir;
										echo "<img src='" . $imageup . "' />";
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
								}
								$findstudentid=$studentid;
								$xml = simplexml_load_file('data/students.xml');
								$chastudents = $xml->xpath('//student[studentid="' . "$findstudentid".'"]');
								foreach($chastudents as $chastudent) {
									$chastudent->studentimg=$imageup;
									$chastudent->studentemail=$newstudentemail;
									$chastudent->studentpassword=$newcstudentpassword;
									}

								$xml->asXML('data/students.xml');
								if ($xml === false)  {
									echo "<p id='invalid'>Update profile is not successful. Please try again.</p>";
								} 
								else {
									echo "<p id='valid'>Profile is successfully updated.</p>";
								header("location:index1.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."");
								}
								}
								else{
									echo "<p id='invalid'>Sorry. Password and confirm password must be same value.</p>";
								}
								}

?>