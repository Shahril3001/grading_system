<?php
	if(isset($_POST['Submit'])) 
	{
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$coursename=$_POST['coursename'];
	$coursegroup=$_POST['coursegroup'];
	$courseid=$_POST['courseid'];
	$coursedesc=$_POST['coursedesc'];
				
	$target_dir="data/img/courses/";
	$target_dir=$target_dir. basename($_FILES["courseimg"]["name"]);
	move_uploaded_file($_FILES["courseimg"]["tmp_name"],$target_dir);
	$imageup=$target_dir;
								
								
	$xml = simplexml_load_file('data/courses.xml');
	$sxe = new SimpleXMLElement ($xml->asXML());
	$course = $sxe->addchild('course');
	$course->addchild('coursename',$coursename);
	$course->addchild('groupname',$coursegroup);
	$course->addchild('courseid',$courseid);
	$course->addchild('courseimg',$imageup);
	$course->addchild('coursedesc',$coursedesc);
	$course->addchild('lecturerid',$lecturerid);
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($sxe->asXML());
	$dom->save('data/courses.xml');
	if ($sxe === false)  {
	echo "<p id='invalid'>Unable to submit course. Please try again.</p>";
	} 
	else {
	echo "<p id='valid'>Course is successfully submitted.</p>";
	header("location:course.php?lecturerid=".$lecturerid."&role=".$role."");
	}
	}
?>