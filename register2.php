<?php
								 if(isset($_POST['Submit'])) 
								{
								$stuname=$_POST['stuname'];
								$stuid=$_POST['stuid'];
								$stugroup=$_POST['stugroup'];
								$stuemail=$_POST['stuemail'];
								$stupassword=$_POST['stupassword'];
								$cstupassword=$_POST['cstupassword'];
								$stuimg="img/account.png";
								$srole="Student";
								$findstudent = false;
								$xml = simplexml_load_file('data/students.xml');
								$studentcheck = $xml->xpath("/students/student");
								
								foreach($studentcheck as $child){
								$cstuid=($child->studentid);
									if(trim($cstuid) == $stuid)
									{
										$findstudent=true;
										break;
									}
								}
								if($findstudent)
								{
									echo "<p id='invalid'>Account: ".$stuid;
									echo ' is already existed. Please click <a href="login.php"><button>Login</button></a> if its your.</p>';
								}
								else{
								if($stupassword==$cstupassword){
								$xml = simplexml_load_file('data/students.xml');
								$sxe = new SimpleXMLElement ($xml->asXML());
								$student = $sxe->addchild('student');
								$student->addchild('studentname',$stuname);
								$student->addchild('studentid',$stuid);
								$student->addchild('studentgroup',$stugroup);
								$student->addchild('studentemail',$stuemail);
								$student->addchild('studentpassword',$stupassword);
								$student->addchild('studentimg',$stuimg);
								$student->addchild('role',$srole);
								$dom = new DOMDocument('1.0');
								$dom->preserveWhiteSpace = false;
								$dom->formatOutput = true;
								$dom->loadXML($sxe->asXML());
								$dom->save('data/students.xml');
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