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
								$programID = 0;
								echo"<h4>Program</h4></br>";
								echo"<center>";
								echo "<center><a href='addprogram.php?lecturerid=".$lecturerid."&role=".$role."'><button>Add New Program</button></a></center></br>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='40px'>#</th>";
								echo"<th></th>";
								echo"<th width='100px'>Action</th>";
								echo"</tr>";
								
								$xml= simplexml_load_file("data/program.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/programs/program[lecturerid="' . "$lecturerid" . '"]');
								foreach($course as $child){
								$groupname= $child->groupname;
								$groupcode=$child->groupcode;
								$groupstart=$child->groupstart;
								$groupend=$child->groupend;
								$lecturerid=$child->lecturerid;
								$groupdescription=$child->groupdescription;
								$newgroupstart = date("d-m-Y", strtotime($groupstart));
								$newgroupend = date("d-m-Y", strtotime($groupend));
								
								$programID++;	
								echo"<tr>";	
								echo "<td>$programID</td>";
								echo"<td style='width:700px; text-align:justify;'><b>Program Name</b>: $groupname</br>
								<b>Program Code</b>: $groupcode</br>
								<b>Duration</b>: From $newgroupstart to $newgroupend</br>
								<b>Description</b>: $groupdescription
								</td>";
								echo"<td><center>
								<p><a href='studentlist.php?lecturerid=".$lecturerid."&role=".$role."&groupname=".$groupname."'><button>Student List</button></a></p>
								<p><a href='programupdate.php?lecturerid=".$lecturerid."&role=".$role."&groupcode=".$groupcode."'><button>Edit</button></a></p>
								<p><a href='programdelete.php?lecturerid=".$lecturerid."&role=".$role."&groupcode=".$groupcode."'><button>Delete</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								echo"</table>";
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