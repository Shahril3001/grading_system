<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grading System</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
	<script src="ckeditor/ckeditor.js"></script>	

</head>
<?php 
include 'header.php';
?>
<body>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
		
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
						<?php
								if(isset($_GET['role'])){
								$role=$_GET['role'];
								if ($role=="Lecturer"){
								$lecturerid=$_GET['lecturerid'];
								$xml = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								$lecturerid =$lecturer->lecturerid;
								$lecturerdepartment =$lecturer->lecturerdepartment;
								$lecturerimg =$lecturer->lecturerimg;
								$lectureremail =$lecturer->lectureremail;
								$lecturerpassword =$lecturer->lecturerpassword;
								}
								
								echo"<h4>Hello $lecturername!</h4></br>";
								echo"<center>";
								echo"<p><img src='$lecturerimg' style='border:1px solid #ccc;border-radius:50%; width:230px; height:230px;' alt='Avatar'></p>";
								echo"<table id='profiletable'>
									<tr>
										<th colspan='2'>Lecturer Profile</th>
									</tr>
									<tr>
										<td>Name</td>
										<td>$lecturername</td>
									</tr>
									<tr>
										<td>Lecturer ID</td>
										<td>$lecturerid</td>
									</tr>
									<tr>
										<td>Department</td>
										<td>$lecturerdepartment</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>$lectureremail</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>$lecturerpassword</td>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><a href='profile-lecturer.php?lecturerid=".$lecturerid."&role=".$role."'><button>Edit Profile</button></a></td>
									</tr>
								</table>";
								echo"</center>";
								}
								else{
								$studentid=$_GET['studentid'];
								$studentgroup=$_GET['studentgroup'];
								$xml = simplexml_load_file('data/students.xml');
								$students = $xml->xpath('//student[studentid="' . "$studentid" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								$studentid =$student->studentid;
								$studentgroup =$student->studentgroup;
								$studentimg =$student->studentimg;
								$studentemail =$student->studentemail;
								$studentpassword =$student->studentpassword;
								}
								
								echo"<h4>Hello $studentname!</h4>";
								echo"<center>";
								echo"<p><img src='$studentimg' style='border:1px solid #ccc;border-radius:50%; width:230px; height:230px;' alt='Avatar'></p>";
								echo"<table id='profiletable'>
									<tr>
										<th colspan='2'>Student Profile</th>
									</tr>
									<tr>
										<td>Name</td>
										<td>$studentname</td>
									</tr>
									<tr>
										<td>Student ID</td>
										<td>$studentid</td>
									</tr>
									<tr>
										<td>Student Group</td>
										<td>$studentgroup</td>
									</tr>
									<tr>
										<td>Email</td>
										<td>$studentemail</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>$studentpassword</td>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><a href='profile-student.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'><button>Edit Profile</button></a></td>
									</tr>
								</table>";
								echo"</center>";
								}
								}
								else{
									
								}
						?>
						
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-area">
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-logo">
                           Grading System
                        </div>
                    <p><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by Shahril&Ahsan</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>