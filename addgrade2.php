<?php
	if(isset($_POST['Submit'])) 
	{
	$lecturerid=$_GET['lecturerid'];
	$role=$_GET['role'];
	$grade_student=$_POST['grade_student'];
	$grade_assessment=$_POST['grade_assessment'];
	$grade_mark=$_POST['grade_mark'];
	$grade_comment=$_POST['grade_comment'];
	$grade_date=date('d-m-Y');
	
	$xml1= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
	$assessment = $xml1->xpath('//assessment[assessmenttitle="' . "$grade_assessment" . '"]');
	foreach($assessment as $child){
	$courseid= $child->courseid;
	$assessmentweightage= $child->assessmentweightage;
	}
	
	if(($grade_mark<100) && ($grade_mark >=80)){
		$grade_status="Distinction";
	}
	elseif(($grade_mark<80) && ($grade_mark>=65)){
		$grade_status="Merit";
	}
	elseif(($grade_mark<65) && ($grade_mark>=50)){
		$grade_status="Pass";
	}
	else{
		$grade_status="Fail";
	}
	
	$xml = simplexml_load_file('data/grade.xml');
	$sxe = new SimpleXMLElement ($xml->asXML());
	$grade = $sxe->addchild('grade');
	$grade->addchild('studentid',$grade_student);
	$grade->addchild('courseid',$courseid);
	$grade->addchild('lecturerid',$lecturerid);
	$grade->addchild('assessmenttitle',$grade_assessment);
	$grade->addchild('grade_mark',$grade_mark);
	$grade->addchild('grade_status',$grade_status);
	$grade->addchild('grade_comment',$grade_comment);
	$grade->addchild('grade_date',$grade_date);
	$dom = new DOMDocument('1.0');
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($sxe->asXML());
	$dom->save('data/grade.xml');
	if ($sxe === false)  {
	echo "<p id='invalid'>Unable to submit grade. Please try again.</p>";
	} 
	else {
	echo "<p id='valid'>Grade is successfully ADDED.</p>";
	header("location:gradelist.php?lecturerid=".$lecturerid."&role=".$role."");
	}
	}
?>