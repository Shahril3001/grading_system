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
	<script src="js/index.js"></script>
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
	<script>
	$(document).ready(function(){
		$("#studenttab").show();
		$("#lecturertab").hide();
	});
	$(document).ready(function(){
    $("#btn1").click(function(){
        $("#studenttab").show();
		$("#lecturertab").hide();
    });
    $("#btn2").click(function(){
        $("#lecturertab").show();
		$("#studenttab").hide();
    });
	});
	</script>
</head>
<?php 
include 'header.php';
session_start();
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
						<center>
							<h3>Login</h3>
							<hr>
							<p></p>
							<button class="logintab" id="btn1">Student</button>
							<button class="logintab" id="btn2">Lecturer</button>
							<div class="logincontainer">
							<div class="detail" id="studenttab">
							<form method="POST" action="login2.php">
								<table id="logintable">
									<tr>
										<th colspan="2">Student</th>
									</tr>
									<tr>
										<td>Student ID</td>
										<td><input type="text" name="studentid" required></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="stupassword" required></td>
									</tr>
									<tr>
										<td colspan="2"  id="buttonrow"><input type="submit" name="Submit" value="Submit"><input type="reset" name="reset" value="Reset"/></td>
									</tr>
								</table>
							</form>
							</div>
							<div class="detail" id="lecturertab">
							<form method="POST" action="login3.php">
								<table id="logintable">
									<tr>
										<th colspan="2">Lecturer</th>
									</tr>
									<tr>
										<td>Lecturer ID</td>
										<td><input type="text" name="lecturerid" required></td>
									</tr>
									<tr>
										<td>Password</td>
										<td><input type="password" name="lectpassword" required></td>
									</tr>
									<tr>
										<td colspan="2"  id="buttonrow"><input type="submit" name="Submit" value="Submit"><input type="reset" name="reset" value="Reset"/></td>
									</tr>
								</table>
							</form>
							</div>
							<p>Don't have any account yet? Please click <a href='register.php'>Register</a> to create new account.</p>
							</div>
						</center>
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
                            <a href="index.html">Grading System</a>
                        </div>
                    <p><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by Shahril&Ahsan</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


	<?php
	?>
</body>

</html>