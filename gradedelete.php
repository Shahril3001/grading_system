<?php
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$assessmenttitle = $_GET["assessmenttitle"];
	$studentid = $_GET["studentid"];
	$file="data/grade.xml";
	
	$xml = simplexml_load_file($file);
	$grade = $xml->xpath('//grade[assessmenttitle="' . "$assessmenttitle" . '" and studentid="' . "$studentid" . '"]');
	unset($grade[0][0]);
	$xml->asXML($file);
	header("location:gradelist.php?lecturerid=".$lecturerid."&role=".$role."");
?>