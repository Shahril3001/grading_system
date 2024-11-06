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
								$studentid= $_POST["studentid"];
								$stupassword= $_POST["stupassword"];	
								$findstudent = false;
								$xml = simplexml_load_file('data/students.xml') or die ("Error: Cannot create object");
								$studentcheck = $xml->xpath("/students/student");
								
								foreach($studentcheck as $child){
								$cstudentid=($child->studentid);
								$cstupassword=($child->studentpassword);
									if(trim($cstudentid) == $studentid && trim($cstupassword) == $stupassword)
									{
										$findstudent=true;
										break;
									}
								}
								if(isset($_SESSION["studentvalidation"]) && $findstudent)
								{
									echo "<p id='valid'>Login is success<p>";
									$_SESSION["studentid"] = $studentid;
									$_SESSION["stupassword"] = $stupassword;
									$xml = simplexml_load_file('data/students.xml');
									$students = $xml->xpath('//student[studentid="' . "$studentid" . '"]');
									foreach($students as $student) {
									$studentid =$student->studentid;
									$role =$student->role;
									$studentgroup =$student->studentgroup;
									}
									header("location:index1.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."");
								}
								else
								{
									$_SESSION['studentvalidation']++;
									if($_SESSION['studentvalidation']<=3){
									echo "<center>";
									echo "<h1>Invalid Login Attempt!</h1>";
									echo "You have attempt ".$_SESSION['studentvalidation']."x for login.</br>";
									echo "<p id='invalid'>Invalid username or password. Please click <a href='login.php'><button>Login</button></a> for re-login.</p>";
									echo "</center>";
									
									}
									else{
										echo "<center>";
										echo "<h1>Invalid Login Attempt!</h1>";
										$_SESSION['studentvalidation']=0;
										echo "<p id='invalid'>Opps! Sorry, you have a wrong username and password. Please wait for 15 second to re-login.<p>";
										echo "<meta http-equiv='refresh' content='15; url=login.php'/>";
										echo "</center>";
									}
								}
								}
?>
</body>
</html>