<!DOCTTYPE html>
<html>
	<head>
		<title></title>
		 <link rel="stylesheet" href="style.css">
	</head>
	<body>
	<?php
							session_start();
							 if(isset($_POST['Submit'])) 
								{
								$lecturerid= $_POST["lecturerid"];
								$lectpassword= $_POST["lectpassword"];	
								$findlecturer = false;
								$xml = simplexml_load_file('data/lecturers.xml') or die ("Error: Cannot create object");
								$lecturercheck = $xml->xpath("/lecturers/lecturer");
								
								foreach($lecturercheck as $child){
								$clecturerid=($child->lecturerid);
								$clectpassword=($child->lecturerpassword);
									if(trim($clecturerid) == $lecturerid && trim($clectpassword) == $lectpassword)
									{
										$findlecturer=true;
										break;
									}
								}
								
								if(isset($_SESSION["lecturervalidation"]) && $findlecturer)
								{
									echo "<p id='valid'>Login is success<p>";
									$lecturerid= $_POST["lecturerid"];
									$_SESSION["lecturerid"] = $lecturerid;
									$_SESSION["lectpassword"] = $lectpassword;
								
									$xml = simplexml_load_file('data/lecturers.xml');
									$lecturers = $xml->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
									foreach($lecturers as $lecturer) {
									$lecturerid =$lecturer->lecturerid;
									$role =$lecturer->role;
									}
									header("location:index1.php?lecturerid=".$lecturerid."&role=".$role."");
								}
								else
								{
									$_SESSION['lecturervalidation']++;
									if($_SESSION['lecturervalidation']<=3){
									echo "<center>";
									echo "<h1>Invalid Login Attempt!</h1>";
									echo "You have attempt ".$_SESSION['lecturervalidation']."x for login.</br>";
									echo "<p id='invalid'>Invalid username or password. Please click <a href='login.php'><button>Login</button></a> for re-login.</p>";
									echo "</center>";
									
									}
									else{
										echo "<center>";
										echo "<h1>Invalid Login Attempt!</h1>";
										$_SESSION['lecturervalidation']=0;
										echo "<p id='invalid'>Opps! Sorry, you have a wrong username and password. Please wait for 15 second to re-login.<p>";
										echo "<meta http-equiv='refresh' content='15; url=login.php'/>";
										echo "</center>";
									}
								}
								}
?>
</body>
</html>