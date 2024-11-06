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
								$gradeID = 0;
								$role=$_GET['role'];
								$lecturerid=$_GET['lecturerid'];
								$studentgroup=$_GET['groupname'];
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
								<p><a href='viewallresult.php?lecturerid=".$lecturerid."&studentid=".$studentid."&role=".$role."&courseid=".$courseid."&studentgroup=".$studentgroup."'><button>View Result</button></a></p>
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