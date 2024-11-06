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
								if($role=="Lecturer"){
								$lecturerid=$_GET['lecturerid'];
								$searchcourse=$_POST['searchcourse'];
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/courses/course[coursename="' . "$searchcourse" . '"]');
								$courseID = 0;
								echo"<h4>Course</h4></br>";
								echo"<center>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th colspan='2'>Course Detail</th>";
								echo"<th>Action</th>";
								echo"</tr>";
								
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$courseimg=$child->courseimg;
								$coursedesc=$child->coursedesc;
								
								$courseID++;	
								echo"<tr>";	
								echo "<td>$courseID</td>";
								echo"<td  width='150px'><center><a href='$courseimg'><img src='$courseimg' alt='' height='200px' width='150px'></a></center></td>";
								echo"<td style='width:700px; text-align:justify;'><b>Course Code</b>: $courseid</br>
								<b>Course Name</b>: $coursename</br>
								<b>Description</b>: $coursedesc
								</td>";
								echo"<td><center>
								<p><a href='addassessment.php?lecturerid=".$lecturerid."&role=".$role."&courseid=".$courseid."'><button>Add Assesement</button></a></p>
								<p><a href='courseupdate.php?lecturerid=".$lecturerid."&role=".$role."&courseid=".$courseid."'><button>Edit</button></a></p>
								<p><a href='coursedelete.php?lecturerid=".$lecturerid."&role=".$role."&courseid=".$courseid."'><button>Delete</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								
								echo"</table>";
								echo"</center>";
								}
								
								else{
								$courseID = 0;
								$searchcourse=$_POST['searchcourse'];
								$studentgroup=$_GET['studentgroup'];
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/courses/course[coursename="' . "$searchcourse" . '" and groupname="' . "$studentgroup" . '"]');
								echo"<h4>Course</h4></br>";
								echo"<center>";							
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th colspan='2'>Course Detail</th>";
								echo"</tr>";
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$courseimg=$child->courseimg;
								$coursedesc=$child->coursedesc;
								$lecturerid=$child->lecturerid;
								
								$xml1 = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml1->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								}
								
								
								$courseID++;	
								echo"<tr>";	
								echo "<td>$courseID</td>";
								echo"<td width='150px'><center><a href='$courseimg'><img src='$courseimg' alt='' height='200px' width='150px'></a></center></td>";
								echo"<td  style='width:700px; text-align:justify;'><b>Course Code</b>: $courseid</br>
								<b>Course Name</b>: $coursename</br>
								<b>Description</b>: $coursedesc
								<b>Lecturer</b>: $lecturername
								</td>";	
								echo"</tr>";
								}
								
								echo"</table>";
								echo"</center>";
								}
								}
								else{
								$courseID = 0;
								$searchcourse=$_POST['searchcourse'];
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/courses/course[coursename="' . "$searchcourse" . '"]');
								echo"<h4>Course</h4></br>";
								echo"<center>";							
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th colspan='2'>Course Detail</th>";
								echo"<th>Action</th>";
								echo"</tr>";
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$courseimg=$child->courseimg;
								$coursedesc=$child->coursedesc;
								$lecturerid=$child->lecturerid;
								
								$xml1 = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml1->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								}
								
								
								$courseID++;	
								echo"<tr>";	
								echo "<td>$courseID</td>";
								echo"<td width='150px'><center><a href='$courseimg'><img src='$courseimg' alt='' height='200px' width='150px'></a></center></td>";
								echo"<td  style='width:700px; text-align:justify;'><b>Course Code</b>: $courseid</br>
								<b>Course Name</b>: $coursename</br>
								<b>Description</b>: $coursedesc
								<b>Lecturer</b>: $lecturername
								</td>";	
								echo"<td><center>
								<p><a href='login.php'><button>Learn More</button></a></p>
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