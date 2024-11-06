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
								$courseid = $_GET['courseid'];
								$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$courses = $xml->xpath('//course[courseid="' . "$courseid" . '"]');
								foreach($courses as $course){
								$courseid=$course->courseid;
								$coursename=$course->coursename;
								$lecturerid=$course->lecturerid;
								$groupname=$course->groupname;
								}
								echo"<center>
								<form method='POST' action='addassessment2.php?lecturerid=".$lecturerid."&role=".$role."'>
								<input type='hidden' name='aslecturerid' value='$lecturerid' size='35' required>
								<input type='hidden' name='asgroupname' value='$groupname' size='35' required>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Add Assessment</th>
									</tr>
									<tr>
										<td>Course Code:</td>
										<td><input type='text' name='ascourseid' value='$courseid' size='35' required></td>
									</tr>
									<tr>
										<td>Course Name:</td>
										<td><input type='text' name='ascoursename' value='$coursename' size='35' required></td>
									</tr>
									<tr>
										<td>Assessment Title:</td>
										<td><input type='text' name='astitle' size='35' required></td>
									</tr>
									<tr>
										<td>Weightage:</td>
										<td><input type='number' name='asweightage' size='35' required></td>
									</tr>
									<tr>
										<td>Type of Assessment:</td>
										<td><select name='astype' style='width: 200px'>
											<option selected='selected'>--- Please select ---</option>
											<option value='Assignment'>Assignment</option>
											<option value='Examination'>Examination</option>
										</select></td>
									</tr>
									<tr>
										<td>Release Date:</td>
										<td><input type='date' name='asdate' size='35' required></td>
									</tr>
									<tr>
										<td>Description:</td>
										<td><textarea name='asdesc' id='editor1' rows='4' cols='20' required></textarea></td>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit' value='Submit'/><input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
								</table>
								</form>
								</center>";
								
								}
						?>
						<script>	
						CKEDITOR.replace( 'editor1' );
						</script>
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