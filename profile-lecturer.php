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
								if(isset($_GET['role'])&&isset($_GET['lecturerid'])){
								$lecturerid=$_GET['lecturerid'];
								$role=$_GET['role'];
								$xml = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								$lecturerid =$lecturer->lecturerid;
								$lecturerimg =$lecturer->lecturerimg;
								$lecturerdepartment =$lecturer->lecturerdepartment;
								$lectureremail =$lecturer->lectureremail;
								$lecturerpassword =$lecturer->lecturerpassword;
								}
								
								echo"<center>";
								echo"<form method='POST' enctype='multipart/form-data' action='profile-lecturer2.php?lecturerid=".$lecturerid."&role=".$role."'>
								
								<table id='profiletable'>
									<tr>
										<th colspan='2'>Update Profile</th>
									</tr>
									<tr>
										<td>Name</td>
										<td><input type='text' value='$lecturername' size='35' disabled></td>
									</tr>
									<tr>
										<td>Lecturer ID</td>
										<td><input type='text' value='$lecturerid' size='35' disabled></td>
									</tr>
									<tr>
										<td>Department</td>
										<td><input type='text' name='newlecturerdepartment' value='$lecturerdepartment' size='35'></td>
									</tr>
									<tr>
										<td>Account Image</td>
										<td><input type='file' name='newlecturerimg'></br>Old picture:<img src='$lecturerimg' alt='' height='50px' width='50px'></a></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><input type='email' name='newlectureremail' value='$lectureremail' size='35'></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type='password' name='newlecturerpassword' value='$lecturerpassword' size='35'></td>
									</tr>
									<tr>
										<td>Confirm Password</td>
										<td><input type='password' name='newclecturerpassword' value='$lecturerpassword' size='35'></td>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit' value='Submit'><input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
									<script>
									function goBack(){
									window.history.back();
									}
									</script>
								</table>";
								echo"</form>";
								echo"</center>";
								
								}
								else{
									echo"Error: Cannot create object";
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