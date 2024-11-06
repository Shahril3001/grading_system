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
								$role=$_GET['role'];
								$studentgroup=$_GET['studentgroup'];
								$studentid=$_GET['studentid'];
								$courseid=$_GET['courseid'];
								$gradeID = 0;
								$total=0;
								$xml3 = simplexml_load_file('data/courses.xml');
								$courses = $xml3->xpath('/courses/course[courseid="' . "$courseid" . '"]');
								foreach($courses as $course) {
								$coursename =$course->coursename;
								}
								
								echo"<h4>$coursename Overall Result</h4></br>";
								echo"<center>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th>#</th>";
								echo"<th>Assessment Title</th>";
								echo"<th>Mark</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/grade.xml") or die ("Error: Cannot create object");
								$grade = $xml->xpath('/grades/grade[studentid="' . "$studentid" . '" and courseid="' . "$courseid" . '"]');
								foreach($grade as $child){
								$assessmenttitle=$child->assessmenttitle;
								$grade_mark=$child->grade_mark;
								$total += $child->grade_mark;
								
								$gradeID++;	
								echo"<tr>";	
								echo "<td width=70px>$gradeID</td>";
								echo"<td  style='width:700px; text-align:justify;'>
								$assessmenttitle</br>
								</td>
								<td width=100px>
								<center>$grade_mark%</center></br>
								</td>";
								echo"</tr>";
								}
								
								$overall2= $total /$gradeID;
								$overall=number_format($overall2,2);
								if(($overall<100) && ($overall >=80)){
									$grade_status="Distinction";
								}
								elseif(($overall<80) && ($overall>=65)){
									$grade_status="Merit";
								}
								elseif(($overall<65) && ($overall>=50)){
									$grade_status="Pass";
								}
								else{
									$grade_status="Fail";
								}
								
								
								echo"<tr>";
								echo"<td colspan='2'>Overall</td>";
								echo"<td><center>$overall% [$grade_status]</center></td>";
								echo"</tr>";
								echo"</table>";
								echo"</center>";
								}
								
								else{
								$role=$_GET['role'];
								$studentid=$_GET['studentid'];
								$courseid=$_GET['courseid'];
								$gradeID = 0;
								$total=0;
								echo"<h4>Grade List</h4></br>";
								echo"<center>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th>#</th>";
								echo"<th>Assessment Title</th>";
								echo"<th>Mark</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/grade.xml") or die ("Error: Cannot create object");
								$grade = $xml->xpath('/grades/grade[studentid="' . "$studentid" . '" and courseid="' . "$courseid" . '"]');
								foreach($grade as $child){
								$assessmenttitle=$child->assessmenttitle;
								$grade_mark=$child->grade_mark;
								$total += $child->grade_mark;
								
								$gradeID++;	
								echo"<tr>";	
								echo "<td width=70px>$gradeID</td>";
								echo"<td  style='width:700px; text-align:justify;'>
								$assessmenttitle</br>
								</td>
								<td width=100px>
								<center>$grade_mark%</center></br>
								</td>";
								echo"</tr>";
								}
								
								$overall2= $total /$gradeID;
								$overall=number_format($overall2,2);
								if(($overall<100) && ($overall >=80)){
									$grade_status="Distinction";
								}
								elseif(($overall<80) && ($overall>=65)){
									$grade_status="Merit";
								}
								elseif(($overall<65) && ($overall>=50)){
									$grade_status="Pass";
								}
								else{
									$grade_status="Fail";
								}
								
								
								echo"<tr>";
								echo"<td colspan='2'>Overall</td>";
								echo"<td><center>$overall% [$grade_status]</center></td>";
								echo"</tr>";
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