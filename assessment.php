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
								$assessmentID = 0;
								
								echo"<h4>Assessment List</h4></br>";
								echo"<center>";
								
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th style='width:400px;'></th>";
								echo"<th style='width:200px;'>Action</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/assessments/assessment[lecturerid="' . "$lecturerid" . '"]');
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$assessmenttitle=$child->assessmenttitle;
								$assessmenttype=$child->assessmenttype;
								$assessmentdate=$child->assessmentdate;
								
								$assessmentID++;	
								echo"<tr>";	
								echo "<td>$assessmentID</td>";
								echo"<td style='width:400px; text-align:justify;'>
								<p><b>Assessment Title</b>: $assessmenttitle</br>
								<b>Course</b>: $coursename ($courseid)</br>
								<b>Type</b>: $assessmenttype</br>
								<b>Release Date</b>: $assessmentdate</br>
								</td>";
								echo"<td><center>
								<p><a href='assessmentview.php?lecturerid=".$lecturerid."&role=".$role."&assessmenttitle=".$assessmenttitle."'><button>View Detail</button></a></p>
								<p><a href='assessmentupdate.php?lecturerid=".$lecturerid."&role=".$role."&assessmenttitle=".$assessmenttitle."'><button>Edit</button></a></p>
								<p><a href='assessmentdelete.php?lecturerid=".$lecturerid."&role=".$role."&assessmenttitle=".$assessmenttitle."'><button>Delete</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								
								echo"</table>";
								echo"</center>";
								
								}
								else{
								$assessmentID = 0;
								$role=$_GET['role'];
								$studentid=$_GET['studentid'];	
								$studentgroup=$_GET['studentgroup'];
								echo"<h4>Assessment List</h4></br>";
								echo"<center>";
								
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='15px'>#</th>";
								echo"<th style='width:400px;'></th>";
								echo"<th style='width:200px;'>Action</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/assessments/assessment[assessmentsgroupname="' . "$studentgroup" . '"]');
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$assessmenttitle=$child->assessmenttitle;
								$assessmentdate=$child->assessmentdate;
								
								$assessmentID++;	
								echo"<tr>";	
								echo "<td>$assessmentID</td>";
								echo"<td style='width:400px; text-align:justify;'>
								<p><b>$assessmenttitle</b></br>
								<b>Course</b>: $coursename ($courseid)</br>
								<b>Release Date</b>: $assessmentdate</br>
								</td>";
								echo"<td><center>
								<p><a href='assessmentview.php?studentid=".$studentid."&role=".$role."&assessmenttitle=".$assessmenttitle."&studentgroup=".$studentgroup."'><button>View Detail</button></a></p>
								<p><a href='resultview.php?studentid=".$studentid."&role=".$role."&assessmenttitle=".$assessmenttitle."&studentgroup=".$studentgroup."'><button>View Result</button></a></p>
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