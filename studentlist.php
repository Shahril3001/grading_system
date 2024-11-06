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
								$groupname=$_GET['groupname'];
								$role=$_GET['role'];
								$studentID = 0;
								echo"<h4>Student List ($groupname)</h4></br>";
								echo"<center>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='40px'>#</th>";
								echo"<th colspan='2'></th>";
								echo"<th width='150px'>Action</th>";
								echo"</tr>";
								
								$xml = simplexml_load_file('data/students.xml');
								$students = $xml->xpath('/students/student[studentgroup="' . "$groupname" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								$studentid =$student->studentid;
								$studentimg =$student->studentimg;
								$studentgroup =$student->studentgroup;
								$studentemail =$student->studentemail;
								$studentID++;	
								
								echo"<tr>";	
								echo "<td>$studentID</td>";
								echo"<td  width='150px'><center><a href='$studentimg'><img src='$studentimg' alt='' height='200px' width='150px'></a></center></td>";
								echo"<td style='width:700px; text-align:justify;'><b>Name</b>: $studentname</br>
								<b>Group Code</b>: $studentgroup</br>
								<b>Student ID</b>: $studentid</br>
								<b>Email</b>: $studentemail
								</td>";
								echo"<td><center>
								<p><a href='gradelist(lecturer).php?lecturerid=".$lecturerid."&role=".$role."&studentid=".$studentid."&groupname=".$groupname."'><button> List Result</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								echo"</table>";
								echo"</center>";
								
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