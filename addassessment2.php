<?php
if(isset($_POST['Submit'])) 
								{
								$lecturerid=$_GET['lecturerid'];
								$role=$_GET['role'];
								$ascourseid=$_POST['ascourseid'];
								$ascoursename=$_POST['ascoursename'];
								$aslecturerid=$_POST['aslecturerid'];
								$asgroupname=$_POST['asgroupname'];
								$astitle=$_POST['astitle'];
								$astype=$_POST['astype'];
								$asdate=$_POST['asdate'];
								$asdesc=$_POST['asdesc'];
								$asweightage=$_POST['asweightage'];
								
								
								$xml = simplexml_load_file('data/assessments.xml');
								$sxe = new SimpleXMLElement ($xml->asXML());
								$assessment = $sxe->addchild('assessment');
								$assessment->addchild('courseid',$ascourseid);
								$assessment->addchild('coursename',$ascoursename);
								$assessment->addchild('lecturerid',$aslecturerid);
								$assessment->addchild('assessmentsgroupname',$asgroupname);
								$assessment->addchild('assessmenttitle',$astitle);
								$assessment->addchild('assessmenttype',$astype);
								$assessment->addchild('assessmentdate',$asdate);
								$assessment->addchild('assessmentescription',$asdesc);
								$assessment->addchild('assessmentweightage',$asweightage);
								$dom = new DOMDocument('1.0');
								$dom->preserveWhiteSpace = false;
								$dom->formatOutput = true;
								$dom->loadXML($sxe->asXML());
								$dom->save('data/assessments.xml');
								if ($sxe === false)  {
									echo "<p id='invalid'>Unable to add assessment. Please try again.</p>";
								} 
								else {
									echo "<p id='valid'>Assessment is successful added.</p>";
									$lecturerid=$_GET['lecturerid'];
									$role=$_GET['role'];
									header("location:assessment.php?lecturerid=".$lecturerid."&role=".$role."");
								}
								}
								?>