<?php
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$email = $_GET["email"];
	$datepost = $_GET["datepost"];
	$file="data/feedback.xml";
	
	$xml = simplexml_load_file($file);
	$feedback = $xml->xpath('//feedback[email="' . "$email" . '" and datepost="' . "$datepost" . '"]');
	unset($feedback[0][0]);
	$xml->asXML($file);
	header("location:feedback.php?lecturerid=".$lecturerid."&role=".$role."");
?>