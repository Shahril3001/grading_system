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
							<h3>Registration</h3>
							<hr>
							<p></p>
							<button class="logintab" id="btn1">Student</button>
							<button class="logintab" id="btn2">Lecturer</button>
							<div class="logincontainer">
							<div class="detail" id="studenttab">
							<form method="POST" action="register2.php">
								<table id="fbtable">
									<tr>
										<th colspan="2">Student</th>
									</tr>
									<tr>
										<td>Name:</td>
										<td><input type="text" name="stuname" required></td>
									</tr>
									<tr>
										<td>Student ID:</td>
										<td><input type="text" name="stuid" required></td>
									</tr>
									<tr>
										<td>Program:</td>
										<td><select name='stugroup' style='width: 200px' required>
										<option selected='selected'>--- Please select ---</option>
										<?php 
										$xml= simplexml_load_file("data/program.xml") or die ("Error: Cannot create object");
										$program = $xml->xpath('/programs/program');
										foreach($program as $child){
											$groupname= $child->groupname;
											echo	"<option value='$groupname'>$groupname</option>";	
										}							
										?>
										</select></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><input type="email" name="stuemail" required></td>
									</tr>
									<tr>
										<td>Password:</td>
										<td><input type="password" name="stupassword" required></td>
									</tr>
									<tr>
										<td>Confirm Password:</td>
										<td><input type="password" name="cstupassword" required></td>
									</tr>
									<tr>
										<td colspan="2"  id="buttonrow"><input type="submit" name="Submit" value="Submit"><input type="reset" name="reset" value="Reset"/></td>
									</tr>
								</table>
								
							</form>
							</div>
							<div class="detail" id="lecturertab">
							<form method="post">
								<table id="fbtable" action="register3.php">
									<tr>
										<th colspan="2">Lecturer</th>
									</tr>
									<tr>
										<td>Name:</td>
										<td><input type="text" name="lectname" required></td>
									</tr>
									<tr>
										<td>Lecturer ID:</td>
										<td><input type="text" name="lectid" required></td>
									</tr>
									<tr>
										<td>Department:</td>
										<td><input type="text" name="lectdepartment" required></td>
									</tr>
									<tr>
										<td>Email:</td>
										<td><input type="email" name="lectemail" required></td>
									</tr>
									<tr>
										<td>Access Code:</td>
										<td><input type="password" name="adminpassword" required></td>
									</tr>
									<tr>
										<td>Password:</td>
										<td><input type="password" name="lectpassword" required></td>
									</tr>
									<tr>
										<td>Confirm Password:</td>
										<td><input type="password" name="clectpassword" required></td>
									</tr>
									<tr>
										<td colspan="2" id="buttonrow"><input type="submit" name="Submit1" value="Submit"><input type="reset" name="reset" value="Reset"/></td>
									</tr>
								</table>
								
							</form>
							</div>
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
</body>

</html>