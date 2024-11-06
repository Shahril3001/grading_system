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
								$role=$_GET['role'];
								
								$lecturerid=$_GET['lecturerid'];
								$gradeID = 0;
								
								echo"<h4>Grade List</h4></br>";
								echo"<center>";
								echo "<center><a href='addgrade.php?lecturerid=".$lecturerid."&role=".$role."'><button>Add Grade</button></a></center></br>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='40px'>#</th>";
								echo"<th></th>";
								echo"<th width='100px'>Action</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/grade.xml") or die ("Error: Cannot create object");
								$grade = $xml->xpath('/grades/grade');
								foreach($grade as $child){
								$studentid= $child->studentid;
								$courseid=$child->courseid;
								$lecturerid=$child->lecturerid;
								$assessmenttitle=$child->assessmenttitle;
								$grade_mark=$child->grade_mark;
								$grade_status=$child->grade_status;
								$grade_comment=$child->grade_comment;
								$grade_date=$child->grade_date;
								
								$xml1 = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml1->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								}
								
								$xml2 = simplexml_load_file('data/students.xml');
								$students = $xml2->xpath('//student[studentid="' . "$studentid" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								}
								
								$xml3 = simplexml_load_file('data/courses.xml');
								$courses = $xml3->xpath('/courses/course[courseid="' . "$courseid" . '"]');
								foreach($courses as $course) {
								$coursename =$course->coursename;
								}
								$gradeID++;	
								echo"<tr>";	
								echo "<td>$gradeID</td>";
								echo"<td  style='width:700px; text-align:justify;'>
								<b>Student Name</b>: $studentname</br>
								<b>Course Name</b>: $coursename</br>
								<b>Assessment Title</b>: $assessmenttitle</br>
								<b>Mark</b>: $grade_mark%</br>
								<b>Grade</b>: $grade_status</br>
								<b>Date</b>: $grade_date</br>
								<b>Comment</b>: $grade_comment</br>
								</td>";	
								echo"<td><center>
								<p><a href='gradeupdate.php?lecturerid=".$lecturerid."&role=".$role."&studentid=".$studentid."&assessmenttitle=".$assessmenttitle."'><button>Edit</button></a></p>
								<p><a href='gradedelete.php?lecturerid=".$lecturerid."&role=".$role."&studentid=".$studentid."&assessmenttitle=".$assessmenttitle."'><button>Delete</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								
								echo"</table>";
								echo"</center>";
								}
								
								else{
								$gradeID = 0;
								$role=$_GET['role'];
								$studentid=$_GET['studentid'];	
								echo"<h4>Grade Result</h4></br>";
								echo"<center>";							
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th></th>";
								echo"<th width='100px'>Action</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/courses/course[groupname="' . "$studentgroup" . '"]');
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								
								$gradeID++;	
								echo"<tr>";	
								echo "<td>$gradeID</td>";
								echo"<td  style='width:700px; text-align:justify;'>
								<h5>$coursename ($courseid)</h5></td>";	
								echo"<td><center>
								<p><a href='viewallresult.php?studentid=".$studentid."&role=".$role."&courseid=".$courseid."&studentgroup=".$studentgroup."'><button>View Result</button></a></p>
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