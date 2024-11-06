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
								if(isset($_GET['role'])&&isset($_GET['studentid'])){
								$studentid=$_GET['studentid'];
								$studentgroup=$_GET['studentgroup'];
								$role=$_GET['role'];
								$xml = simplexml_load_file('data/students.xml');
								$students = $xml->xpath('//student[studentid="' . "$studentid" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								$studentid =$student->studentid;
								$studentimg =$student->studentimg;
								$studentgroup =$student->studentgroup;
								$studentemail =$student->studentemail;
								$studentpassword =$student->studentpassword;
								$role =$student->role;
								}
								
							
								echo"<center>";
								echo"<form method='POST' enctype='multipart/form-data' action='profile-student2.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>";
								
								echo"<table id='profiletable'>
									<tr>
										<th colspan='2'>Update Profile</th>
									</tr>
									<tr>
										<td>Name</td>
										<td><input type='text' value='$studentname' size='35' disabled></td>
									</tr>
									<tr>
										<td>Student ID</td>
										<td><input type='text' value='$studentid' size='35' disabled></td>
									</tr>
									<tr>
										<td>Group Code</td>
										<td><input type='text' value='$studentgroup' size='35' disabled></td>
									</tr>
									<tr>
										<td>Student Account Image</td>
										<td><input type='file' name='newstudentimg'></br>Old picture:<img src='$studentimg' alt='' height='50px' width='50px'></a></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><input type='email' name='newstudentemail' value='$studentemail' size='35'></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type='password' name='newstudentpassword' value='$studentpassword' size='35'></td>
									</tr>
									<tr>
										<td>Confirm Password</td>
										<td><input type='password' name='newcstudentpassword' value='$studentpassword' size='35'></td>
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