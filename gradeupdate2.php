<?php
	if(isset($_POST['Submit'])) 
	{
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$studentid = $_GET['studentid'];
	$assessmenttitle = $_GET['assessmenttitle'];
	
	$newgrade_mark=$_POST['newgrade_mark'];
	$newgrade_comment=$_POST['newgrade_comment'];
	$newgrade_date=date('d-m-Y');
								
	if(($newgrade_mark<100) && ($newgrade_mark >=80)){
	$newgrade_status="Distinction";
	}
	elseif((newgrade_mark) && ($newgrade_mark>=65)){
		$newgrade_status="Merit";
	}
	elseif(($newgrade_mark<65) && ($newgrade_mark>=50)){
		$newgrade_status="Pass";
	}
	else{
		$newgrade_status="Fail";
	}
								
								
								
	$xml= simplexml_load_file("data/grade.xml") or die ("Error: Cannot create object");
	$grade = $xml->xpath('/grades/grade[assessmenttitle="' . "$assessmenttitle" . '" and studentid="' . "$studentid" . '"]');
	foreach($grade as $child){
	$child->grade_mark=$newgrade_mark;
	$child->grade_status=$newgrade_status;
	$child->grade_comment=$newgrade_comment;
	$child->grade_date=$newgrade_date;
	}						
	$xml->asXML('data/grade.xml');
	if ($xml === false)  {
		echo "<p id='invalid'>Update grade is not successful. Please try again.</p>";
	} 
	else {
	echo "<p id='valid'>Grade is successfully updated.</p>";
	header("location:gradelist.php?lecturerid=".$lecturerid."&role=".$role."");
	}
	}
?>