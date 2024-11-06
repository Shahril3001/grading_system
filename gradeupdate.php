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
								if(isset($_GET['role'])&&isset($_GET['lecturerid'])&&isset($_GET['studentid'])){
								$lecturerid=$_GET['lecturerid'];
								$role=$_GET['role'];
								$studentid = $_GET['studentid'];
								$assessmenttitle = $_GET['assessmenttitle'];

								$xml= simplexml_load_file("data/grade.xml") or die ("Error: Cannot create object");
								$grade = $xml->xpath('/grades/grade[assessmenttitle="' . "$assessmenttitle" . '" and studentid="' . "$studentid" . '"]');
								foreach($grade as $child){
								$dstudentid=$child->studentid;
								$dcourseid=$child->courseid;
								$dassessmenttitle=$child->assessmenttitle;
								$dgrade_mark=$child->grade_mark;
								$dgrade_status=$child->grade_status;
								$dgrade_comment=$child->grade_comment;
								$dgrade_date=$child->grade_date;
								}
								$xml2 = simplexml_load_file('data/students.xml');
								$students = $xml2->xpath('//student[studentid="' . "$dstudentid" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								}
								
								
								
								echo"<center>
								<form method='POST' enctype='multipart/form-data' action='gradeupdate2.php?lecturerid=".$lecturerid."&role=".$role."&studentid=".$studentid."&assessmenttitle=".$assessmenttitle."'>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Grade Detail</th>
									</tr>
									<tr>
										<td><b>Assessment Title:</b></td>
										<td><input type='text' value='$dassessmenttitle' size='50' disabled></td>
									</tr>
									<tr>
										<td><b>Student Name:</b></td>
										<td><input type='text' value='$studentname ($dstudentid)' size='50' disabled></td>
									</tr>
									<tr>
										<td><b>Mark:</b></td>
										<td><input type='text' name='newgrade_mark' value='$dgrade_mark' size='50'></td>
									</tr>
										<tr>
										<td><b>Grade:</b></td>
										<td><input type='text' value='$dgrade_status' size='50' disabled></td>
									</tr>
									<tr>
										<td><b>Date Release:</b></td>
										<td><input type='text' value='$dgrade_date' size='50' disabled></td>
									</tr>
									<tr>
										<td><b>Comment:</b></td>
										<td><textarea name='newgrade_comment' id='editor1' rows='4' cols='20' required>$dgrade_comment</textarea></td>
										<script>	
									CKEDITOR.replace( 'editor1' );
									</script>
									</tr>
									<tr>
									<td colspan='2'  id='buttonrow'>
										<input type='submit' name='Submit' value='Submit'/><input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
								</table>
								</form>
								</center>";
								
								}
								else{
									echo"No result found";
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