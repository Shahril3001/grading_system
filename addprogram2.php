<?php
	if(isset($_POST['Submit'])) 
	{
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$groupname=$_POST['groupname'];
	$groupcode=$_POST['groupcode'];
	$groupstart=$_POST['groupstart'];
	$groupend=$_POST['groupend'];
	$lecturerid=$_POST['lecturerid'];
	$groupdesc=$_POST['groupdesc'];
								
	$xml = simplexml_load_file('data/program.xml');
	$sxe = new SimpleXMLElement ($xml->asXML());
	$program = $sxe->addchild('program');
	$program->addchild('groupname',$groupname);
	$program->addchild('groupcode',$groupcode);
	$program->addchild('groupstart',$groupstart);
	$program->addchild('groupend',$groupend);
	$program->addchild('lecturerid',$lecturerid);
	$program->addchild('groupdescription',$groupdesc);
	
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($sxe->asXML());
	$dom->save('data/program.xml');
	if ($sxe === false)  {
	echo "<p id='invalid'>Unable to program course. Please try again.</p>";
	} 
	else {
	echo "<p id='valid'>Program is successfully added.</p>";
	header("location:programlist.php?lecturerid=".$lecturerid."&role=".$role."");
	}
	}
?>