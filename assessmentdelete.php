<?php
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$assessmenttitle = $_GET["assessmenttitle"];
	$file="data/assessments.xml";
	
	$xml = simplexml_load_file($file);
	$assessment = $xml->xpath('//assessment[assessmenttitle="' . "$assessmenttitle" . '"]');
	unset($assessment[0][0]);
	$xml->asXML($file);
	header("location:assessment.php?lecturerid=".$lecturerid."&role=".$role."");
?>