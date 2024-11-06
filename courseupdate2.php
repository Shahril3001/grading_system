<?php
	if(isset($_POST['Submit'])) 
								{
								$courseid = $_GET['courseid'];
								$newcoursename=$_POST['newcoursename'];
								$newcoursegroup=$_POST['newcoursegroup'];
								$newcoursedesc=$_POST['newcoursedesc'];
								
								$target_dir = "data/img/courses/";
								$target_dir = $target_dir . basename( $_FILES["newcourseimg"]["name"]);
								$uploadOk=1;

								if (file_exists($target_dir . $_FILES["newcourseimg"]["name"])) {
									echo "Sorry, file already exists.";
									$uploadOk = 0;
								}
								if ($uploadOk==0) {
									echo "Sorry, your file was not uploaded.";
								} 
								else { 
									if (move_uploaded_file($_FILES["newcourseimg"]["tmp_name"], $target_dir)) 
									{
										$imageup = $target_dir;
										echo "<img src='" . $imageup . "' />";
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
								}
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$courses = $xml->xpath('/courses/course[courseid="' . "$courseid" . '"]');
								foreach($courses as $child){
								$child->coursename=$newcoursename;
								$child->coursegroup=$newcoursegroup;
								$child->courseimg=$imageup;
								$child->coursedesc=$newcoursedesc;
								}


								$xml->asXML('data/courses.xml');
								if ($xml === false)  {
									echo "<p id='invalid'>Update course is not successful. Please try again.</p>";
								} 
								else {
									echo "<p id='valid'>Course is successfully updated.</p>";
									$lecturerid=$_GET['lecturerid'];
									$role=$_GET['role'];
								header("location:course.php?lecturerid=".$lecturerid."&role=".$role."");
								}
								}
?>