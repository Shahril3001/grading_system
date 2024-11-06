<?php
	if(isset($_POST['Submit'])) 
	{
	$groupcode = $_GET['groupcode'];
	$newgroupname=$_POST['newgroupname'];
	$newgroupstart=$_POST['newgroupstart'];
	$newgroupend=$_POST['newgroupend'];
	$newgroupdescription=$_POST['newgroupdescription'];
					
	$xml= simplexml_load_file("data/program.xml") or die ("Error: Cannot create object");
	$program = $xml->xpath('/programs/program[groupcode="' . "$groupcode" . '"]');
	foreach($program as $child){
	$child->groupname=$newgroupname;
	$child->groupstart=$newgroupstart;
	$child->groupend=$newgroupend;
	$child->groupdescription=$newgroupdescription;
	}


	$xml->asXML('data/program.xml');
	if ($xml === false)  {
	echo "<p id='invalid'>Update program is not successful. Please try again.</p>";
	} 
	else {
	echo "<p id='valid'>Program is successfully updated.</p>";
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	header("location:programlist.php?lecturerid=".$lecturerid."&role=".$role."");
	}
	}
?>