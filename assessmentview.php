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
								$role=$_GET['role'];
								$assessmenttitle = $_GET['assessmenttitle'];
								$xml= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
								$assessments = $xml->xpath('/assessments/assessment[assessmenttitle="' . "$assessmenttitle" . '"]');
								foreach($assessments as $assessment){
								$dcourseid=$assessment->courseid;
								$dcoursename=$assessment->coursename;
								$dassessmenttitle=$assessment->assessmenttitle;
								$dassessmenttype=$assessment->assessmenttype;
								$dassessmentdate=$assessment->assessmentdate;
								$dassessmentdescription=$assessment->assessmentdescription;
								$dassessmentweightage=$assessment->assessmentweightage;
								}
								echo"<center>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Assessment Detail</th>
									</tr>
									<tr>
										<td>Course Code:</td>
										<td>$dcourseid</td>
									</tr>
									<tr>
										<td>Course Name:</td>
										<td>$dcoursename</td>
									</tr>
										<tr>
										<td>Assessment Title:</td>
										<td>$dassessmenttitle</td>
									</tr>
										<tr>
										<td>Assessment Type:</td>
										<td>$dassessmenttype</td>
									</tr>
										<tr>
										<td>Release Date:</td>
										<td>$dassessmentdate</td>
									</tr>
									<tr>
										<td>Description:</td>
										<td>$dassessmentdescription</td>
									</tr>
									<tr>
										<td>Weightage:</td>
										<td>$dassessmentweightage%</td>
									</tr>
									<tr>
									<td colspan='2'  id='buttonrow'>
										<input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
								</table>
								</center>";
								
								}
								else{
								$assessmenttitle = $_GET['assessmenttitle'];
								$xml= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
								$assessments = $xml->xpath('/assessments/assessment[assessmenttitle="' . "$assessmenttitle" . '"]');
								foreach($assessments as $assessment){
								$dcourseid=$assessment->courseid;
								$dcoursename=$assessment->coursename;
								$dassessmenttitle=$assessment->assessmenttitle;
								$dassessmenttype=$assessment->assessmenttype;
								$dassessmentdate=$assessment->assessmentdate;
								$dassessmentdescription=$assessment->assessmentdescription;
								$dassessmentweightage=$assessment->assessmentweightage;
								}
								echo"<center>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Assessment Detail</th>
									</tr>
									<tr>
										<td>Course Code:</td>
										<td>$dcourseid</td>
									</tr>
									<tr>
										<td>Course Name:</td>
										<td>$dcoursename</td>
									</tr>
										<tr>
										<td>Assessment Title:</td>
										<td>$dassessmenttitle</td>
									</tr>
										<tr>
										<td>Assessment Type:</td>
										<td>$dassessmenttype</td>
									</tr>
										<tr>
										<td>Release Date:</td>
										<td>$dassessmentdate</td>
									</tr>
									<tr>
										<td>Description:</td>
										<td>$dassessmentdescription</td>
									</tr>
									<tr>
										<td>Weightage:</td>
										<td>$dassessmentweightage%</td>
									</tr>
									<tr>
									<td colspan='2'  id='buttonrow'>
										<input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
								</table>
								</center>";
								}
						?>
						<script>
						function goBack(){
						window.history.back();
						}
						</script>
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