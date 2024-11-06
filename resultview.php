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
								if(isset($_GET['role'])&&isset($_GET['studentid'])&&isset($_GET['assessmenttitle'])){
								$studentid=$_GET['studentid'];
								$role=$_GET['role'];
								$assessmenttitle = $_GET['assessmenttitle'];

								$xml = simplexml_load_file('data/grade.xml');
								$grades = $xml->xpath('//grade[assessmenttitle="' . "$assessmenttitle" . '" and studentid="' . "$studentid" . '"]') or die ("No result is found.");
								foreach($grades as $grade) {
								$assessmenttitle =$grade->assessmenttitle;
								$grade_mark =$grade->grade_mark;
								$grade_status =$grade->grade_status;
								$grade_comment =$grade->grade_comment;
								$grade_date =$grade->grade_date;
								}
								
								echo"<center>
								<table id='coursetable'>
									<tr>
										<th colspan='2'>Assessment Detail</th>
									</tr>
									<tr>
										<td><b>Assessment Title:</b></td>
										<td>$assessmenttitle</td>
									</tr>
									<tr>
										<td><b>Mark:</b></td>
										<td>$grade_mark%</td>
									</tr>
										<tr>
										<td><b>Grade:</b></td>
										<td>$grade_status</td>
									</tr>
									<tr>
										<td><b>Date Release:</b></td>
										<td>$grade_date</td>
									</tr>
									<tr>
										<td><b>Comment:</b></td>
										<td>$grade_comment</td>
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