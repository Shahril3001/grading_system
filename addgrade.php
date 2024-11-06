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
							
								echo"<h4>Add Grade</h4></br>";
								echo"<center>";

								echo "<form method='POST' enctype='multipart/form-data' action='addgrade2.php?lecturerid=".$lecturerid."&role=".$role."'>
								<input type='hidden' name='lecturerid' value='$lecturerid'>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Add Grade</th>
									</tr>
									<tr>
										<td><b>Student Name:</b></td>
										<td><select name='grade_student' style='width: 200px' required>
										<option selected='selected'>--- Select student---</option>";
										$xml= simplexml_load_file("data/students.xml") or die ("Error: Cannot create object");
										$student = $xml->xpath('/students/student');
										foreach($student as $child){
											$studentname= $child->studentname;		
											$studentid= $child->studentid;
											$studentgroup= $child->studentgroup;
											echo	"<option value='$studentid'>$studentname ($studentgroup)</option>";	
										}
																					
										echo"</select></td>
									</tr>
									<tr>
										<td><b>Assessment Name:</b></td>
										<td><select name='grade_assessment' style='width: 200px' required>
										<option selected='selected'>--- Select Assessment---</option>";
										$xml1= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
										$assessment = $xml1->xpath('/assessments/assessment');
										foreach($assessment as $child){
											$assessmenttitle= $child->assessmenttitle;
											echo	"<option value='$assessmenttitle'>$assessmenttitle</option>";	
										}
																					
										echo"</select></td>
									</tr>
									<tr>
										<td><b>Total Mark:</b></td>
										<td><input type='number' name='grade_mark' size='35' required></td>
									</tr>
									<tr>
										<td><b>Comment:</b></td>
										<td><textarea name='grade_comment' id='editor1' rows='4' cols='20'></textarea></td>
											<script>	
											CKEDITOR.replace( 'editor1' );
											</script>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit' value='Submit'/><input type='reset' name='reset' value='Reset'/></td>
									</tr>
								</table>
                              
							</form>";
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