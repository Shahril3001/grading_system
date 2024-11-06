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
								
								echo"<h4>Course</h4></br>";
								echo"<center>";

								echo "<form method='POST' enctype='multipart/form-data' action='addcourse2.php?lecturerid=".$lecturerid."&role=".$role."'>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Add Course</th>
									</tr>
									<tr>
										<td>Course Code</td>
										<td><input type='text' name='courseid' size='35' required></td>
									</tr>
									<tr>
										<td>Course Name</td>
										<td><input type='text' name='coursename' size='35' required></td>
									</tr>
									<tr>
										<td>Student Group:</td>
										<td><select name='coursegroup' style='width: 200px' required>
										<option selected='selected'>--- Select Group---</option>";
										$xml1= simplexml_load_file("data/program.xml") or die ("Error: Cannot create object");
										$program = $xml1->xpath('/programs/program');
										foreach($program as $child){
											$groupname= $child->groupname;
											echo	"<option value='$groupname'>$groupname</option>";	
										}
																					
										echo"</select></td>
									</tr>
									<tr>
										<td>Course Image</td>
										<td><input type='file' name='courseimg' required></td>
									</tr>
									<tr>
										<td>Description</td>
										<td><textarea name='coursedesc' id='editor1' rows='4' cols='20' required></textarea></td>
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