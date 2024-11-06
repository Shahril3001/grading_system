<?php
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$groupcode = $_GET["groupcode"];
	$file="data/program.xml";
	$xml = simplexml_load_file($file);
	$program = $xml->xpath('//program[groupcode="' . "$groupcode" . '"]');
	unset($program[0][0]);
	$xml->asXML($file);
	header("location:programlist.php?lecturerid=".$lecturerid."&role=".$role."");
?>