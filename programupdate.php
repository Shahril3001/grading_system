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
								if(isset($_GET['lecturerid'])&&isset($_GET['role'])){
								$role=$_GET['role'];
								$lecturerid=$_GET['lecturerid'];
								$groupcode = $_GET['groupcode'];
								$xml= simplexml_load_file("data/program.xml") or die ("Error: Cannot create object");
								$programs = $xml->xpath('//program[groupcode="' . "$groupcode" . '"]');
								foreach($programs as $child){
								$dgroupname=$child->groupname;
								$dgroupcode=$child->groupcode;
								$dgroupstart=$child->groupstart;
								$dgroupend=$child->groupend;
								$dgroupdescription=$child->groupdescription;
								}
								
								
								echo"<center>
								<form method='POST' enctype='multipart/form-data' action='programupdate2.php?lecturerid=".$lecturerid."&role=".$role."&groupcode=".$groupcode."'>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Program Detail</th>
									</tr>
									<tr>
										<td>Program Name:</td>
										<td><input type='text' name='newgroupname' value='$dgroupname' size='50' ></td>
									</tr>
									<tr>
										<td>Program Code:</td>
										<td><input type='text' value='$dgroupcode' size='50' disabled></td>
									</tr>
									<tr>
										<td>Program Start:</td>
										<td><input type='date' name='newgroupstart' value='$dgroupstart' size='50'></td>
									</tr>
									<tr>
										<td>Program End:</td>
										<td><input type='date' name='newgroupend' value='$dgroupend' size='50'></td>
									</tr>
									<tr>
										<td>Description:</td>
										<td><textarea name='newgroupdescription' id='editor1' rows='4' cols='20' required>$dgroupdescription</textarea></td>
									</tr>
									<script>	
									CKEDITOR.replace( 'editor1' );
									</script>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit' value='Submit'/><input type='button' name='back' value='Back' onclick='goBack()'></td>
									</tr>
								</table>
								</form>
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