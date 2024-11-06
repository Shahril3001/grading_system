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
								if(isset($_GET['role'])){
								$role=$_GET['role'];
								
								if($role=="Lecturer"){
								$lecturerid=$_GET['lecturerid'];
								$feedbackID = 0;
								$xml1 = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml1->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								}
								
								
								echo"<h4>Feedback List</h4></br>";
								echo"<center>";
								echo"<table id='courselisttable'>";
								echo"<tr>";
								echo"<th width='10px'>#</th>";
								echo"<th></th>";
								echo"<th style='width:50px;'>Action</th>";
								echo"</tr>";
								$xml= simplexml_load_file("data/feedback.xml") or die ("Error: Cannot create object");
								$feedback = $xml->xpath('/feedbacks/feedback[lecturer="' . "$lecturername" . '"]');
								foreach($feedback as $child){
								$fname= $child->name;
								$fsubject= $child->subject;
								$email=$child->email;
								$comment=$child->comment;
								$datepost=$child->datepost;
								
								$feedbackID++;	
								echo"<tr>";	
								echo "<td>$feedbackID</td>";
								echo"<td style='width:400px; text-align:justify;'>
								<h4><img src='img/account.png' style='border:1px solid #ccc; width:60px; height:60px;' alt='Avatar'>  $fname</h4>
								<p><b>Email:</b> $email</br> 
								<b>Post On:</b> $datepost </br>
								<b>Comment:</b> $comment</p>
								
								</td>";
								echo"<td style='width:50px;'><center>
	<p><a href='feedbackdelete.php?lecturerid=".$lecturerid."&role=".$role."&email=".$email."&datepost=".$datepost."'><button>Delete</button></a></p>
								</center>
								</td>";
								echo"</tr>";
								}
								
								echo"</table>";
								echo"</center>";
								}
								else{
									echo"
								<h3>Feedback</h3>
								<hr>
								<p></p>";
								if(isset($_POST["Submit1"])) 
								{
								$fname=$_POST['fname'];
								$flecturer=$_POST['flecturer'];
								$femail=$_POST['femail'];
								$fsubject=$_POST['fsubject'];
								$fcomment=$_POST['fcomment'];
								$datepost=date('d-m-Y');
								
								$xml = simplexml_load_file('data/feedback.xml');
								$sxe = new SimpleXMLElement ($xml->asXML());
								$feedback = $sxe->addchild('feedback');
								$feedback->addchild('name',$fname);
								$feedback->addchild('lecturer',$flecturer);
								$feedback->addchild('email',$femail);
								$feedback->addchild('subject',$fsubject);
								$feedback->addchild('comment',$fcomment);
								$feedback->addchild('datepost',$datepost);
								$dom = new DOMDocument('1.0');
								$dom->preserveWhiteSpace = false;
								$dom->formatOutput = true;
								$dom->loadXML($sxe->asXML());
								$dom->save('data/feedback.xml');
								if ($sxe === false)  {
								echo "<p id='invalid'>Unable to submit feedback. Please try again.</p>";
								} 
								else {
								echo "<p id='valid'>Feedback is successfully submitted.</p>";
								}
								}
								
								$xml = simplexml_load_file('data/students.xml');
								$students = $xml->xpath('//student[studentid="' . "$studentid" . '"]');
								foreach($students as $student) {
								$studentname =$student->studentname;
								$studentemail =$student->studentemail;
								}
								echo"<center>
								
							<form method='POST'>
								<table id='fbtable'>
									<tr>
										<th colspan='2'>Feedback Form</th>
									</tr>
									<tr>
										<td><b>Name: </b></td>
										<td><input type='text' name='fname' size='35' value='$studentname'required></td>
									</tr>
									<tr>
										<td><b>Lecturer: </b></td>
										<td><select name='flecturer' style='width: 200px' required>
										<option selected='selected'>--- Select Lecturer---</option>";
										$xml1= simplexml_load_file("data/lecturers.xml") or die ("Error: Cannot create object");
										$lecturer = $xml1->xpath('/lecturers/lecturer');
										foreach($lecturer as $child){
											$lecturername= $child->lecturername;
											echo	"<option value='$lecturername'>$lecturername</option>";	
										}
																					
										echo"</select></td>
									</tr>
									<tr>
										<td><b>Subject: </b></td>
										<td><input type='text' name='fsubject' size='35' required></td>
									</tr>
									<tr>
										<td><b>Email: </b></td>
										<td><input type='email' name='femail' size='35' value='$studentemail' required></td>
									</tr>
									<tr>
										<td><b>Comment: </b></td>
										<td><textarea name='fcomment' id='editor1' rows='4' cols='20' required></textarea></td>
									<script>	
									CKEDITOR.replace( 'editor1' );
									</script>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit1' value='Submit'/><input type='reset' name='reset' value='Reset'/></td>
									</tr>
								</table>
                              
							</form></center>";
								}
								}
								else{
								echo"
								<h3>Feedback</h3>
								<hr>
								<p></p>";
								if(isset($_POST["Submit"])) 
								{
								$fname=$_POST['fname'];
								$flecturer=$_POST['flecturer'];
								$femail=$_POST['femail'];
								$fsubject=$_POST['fsubject'];
								$fcomment=$_POST['fcomment'];
								$datepost=date('d-m-Y');
								
								$xml = simplexml_load_file('data/feedback.xml');
								$sxe = new SimpleXMLElement ($xml->asXML());
								$feedback = $sxe->addchild('feedback');
								$feedback->addchild('name',$fname);
								$feedback->addchild('lecturer',$flecturer);
								$feedback->addchild('email',$femail);
								$feedback->addchild('subject',$fsubject);
								$feedback->addchild('comment',$fcomment);
								$feedback->addchild('datepost',$datepost);
								$dom = new DOMDocument('1.0');
								$dom->preserveWhiteSpace = false;
								$dom->formatOutput = true;
								$dom->loadXML($sxe->asXML());
								$dom->save('data/feedback.xml');
								if ($sxe === false)  {
								echo "<p id='invalid'>Unable to submit feedback. Please try again.</p>";
								} 
								else {
								echo "<p id='valid'>Feedback is successfully submitted.</p>";
								}
								}
			
								echo"<center>
							<form method='POST'>
								<table id='fbtable'>
									<tr>
										<th colspan='2'>Feedback Form</th>
									</tr>
									<tr>
										<td><b>Name: </b></td>
										<td><input type='text' name='fname' size='35' required></td>
									</tr>
									<tr>
										<td><b>Lecturer: </b></td>
										<td><select name='flecturer' style='width: 200px' required>
										<option selected='selected'>--- Select Lecturer---</option>";
										$xml1= simplexml_load_file("data/lecturers.xml") or die ("Error: Cannot create object");
										$lecturer = $xml1->xpath('/lecturers/lecturer');
										foreach($lecturer as $child){
											$lecturername= $child->lecturername;
											echo	"<option value='$lecturername'>$lecturername</option>";	
										}
																					
										echo"</select></td>
									</tr>
									<tr>
										<td><b>Subject: </b></td>
										<td><input type='text' name='fsubject' size='35' required></td>
									</tr>
									<tr>
										<td><b>Email: </b></td>
										<td><input type='email' name='femail' size='35' required></td>
									</tr>
									<tr>
										<td><b>Comment: </b></td>
										<td><textarea name='fcomment' id='editor1' rows='4' cols='20' required></textarea></td>
									<script>	
									CKEDITOR.replace( 'editor1' );
									</script>
									</tr>
									<tr>
										<td colspan='2'  id='buttonrow'><input type='submit' name='Submit' value='Submit'/><input type='reset' name='reset' value='Reset'/></td>
									</tr>
								</table>
                              
							</form></center>";
								
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