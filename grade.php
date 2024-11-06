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
							<h3>Grading System</h3>
							<hr>
							<p>Cumulative Grade Point Average system</p>
							<table id="marktable">
								<tr>
									<th>Grade</th>
									<th>Grade Point</th>
									<th>Mark</th>
								</tr>
								<tr>
									<td>Distinction</td>
									<td>3.0</td>
									<td>80 - 100</td>
								</tr>
								<tr>
									<td>Merit</td>
									<td>2.0</td>
									<td>65 - 79</td>
								</tr>
								<tr>
									<td>Pass</td>
									<td>1.0</td>
									<td>50 - 64</td>
								</tr>
								<tr>
									<td>Fail</td>
									<td>0</td>
									<td>50</td>
								</tr>
							</table>
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