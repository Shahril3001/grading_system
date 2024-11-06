<?php
								 if(isset($_POST['Submit1'])) 
								{
								$lectname=$_POST['lectname'];
								$lectid=$_POST['lectid'];
								$lectdepartment=$_POST['lectdepartment'];
								$lectemail=$_POST['lectemail'];
								$lectpassword=$_POST['lectpassword'];
								$clectpassword=$_POST['clectpassword'];
								$adminpassword=$_POST['adminpassword'];
								$lrole="Lecturer";
								$lectimg="img/account.png";
								$cadminpassword="admin";
								$findlecturer = false;
								$xml = simplexml_load_file('data/lecturers.xml');
								$lecturercheck = $xml->xpath("/lecturers/lecturer");
								
								foreach($lecturercheck as $child){
								$clectid=($child->lecturerid);
									if(trim($clectid) == $lectid)
									{
										$findlecturer=true;
										break;
									}
								}
								if($findlecturer)
								{
									echo "<p id='invalid'>Account: ".$lectid;
									echo ' is already existed. Please click <a href="login.php"><button>Login</button></a> if its your.</p>';
								}
								else{
								if($lectpassword==$clectpassword && $cadminpassword==$adminpassword){
								$xml = simplexml_load_file('data/lecturers.xml');
								$sxe = new SimpleXMLElement ($xml->asXML());
								$lecturer = $sxe->addchild('lecturer');
								$lecturer->addchild('lecturername',$lectname);
								$lecturer->addchild('lecturerid',$lectid);
								$lecturer->addchild('lecturerdepartment',$lectdepartment);
								$lecturer->addchild('lecturerimg',$lectimg);
								$lecturer->addchild('lectureremail',$lectemail);
								$lecturer->addchild('lecturerpassword',$clectpassword);
								$lecturer->addchild('role',$lrole);
								$dom = new DOMDocument('1.0');
								$dom->preserveWhiteSpace = false;
								$dom->formatOutput = true;
								$dom->loadXML($sxe->asXML());
								$dom->save('data/lecturers.xml');
								if ($sxe === false)  {
									echo "<p id='invalid'>Registration is not successful. Please try again.</p>";
								} 
								else {
									echo "<p id='valid'>Registration is successfully submitted. Please click <a href='login.php'><button>Login</button></a> for login.</p>";
								}}
								else{
									echo "<p id='invalid'>Sorry. Password and confirm password must be same value.</p>";
								}
								}
								}
								?>