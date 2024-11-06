<?php
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$courseid = $_GET["courseid"];
	$file="data/courses.xml";
	$xml = simplexml_load_file($file);
	$course = $xml->xpath('//course[courseid="' . "$courseid" . '"]');
	unset($course[0][0]);
	$xml->asXML($file);
	header("location:course.php?lecturerid=".$lecturerid."&role=".$role."");
?>