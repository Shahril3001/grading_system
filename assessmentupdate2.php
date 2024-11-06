<?php
	if(isset($_POST['Submit'])) 
								{
								$lecturerid=$_GET['lecturerid'];
								$role=$_GET['role'];
								$assessmenttitle = $_GET['assessmenttitle'];
								$newcourseid=$_POST['newcourseid'];
								$newcoursename=$_POST['newcoursename'];
								$newassessmenttitle=$_POST['newassessmenttitle'];
								$newassessmenttype=$_POST['newassessmenttype'];
								$newassessmentdate=$_POST['newassessmentdate'];
								$newassessmentdescription=$_POST['newassessmentdescription'];
								$newassessmentweightage=$_POST['newassessmentweightage'];
								
								$xml= simplexml_load_file("data/assessments.xml") or die ("Error: Cannot create object");
								$assessments = $xml->xpath('/assessments/assessment[assessmenttitle="' . "$assessmenttitle" . '"]');	
								foreach($assessments as $child){								
								$child->courseid=$newcourseid;
								$child->coursename=$newcoursename;
								$child->assessmenttype=$newassessmenttype;
								$child->assessmentdate=$newassessmentdate;
								$child->assessmentdescription=$newassessmentdescription;
								$child->assessmentweightage=$newassessmentweightage;
								}
								$xml->asXML('data/assessments.xml');
								if ($xml === false)  {
									echo "<p id='invalid'>Update course is not successful. Please try again.</p>";
								} 
								else {
									echo "<p id='valid'>Course is successfully updated.</p>";
									header("location:assessment.php?lecturerid=".$lecturerid."&role=".$role."");
								}
								}
								?>