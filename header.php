    <header class="header-area">
        <div class="top-header-area d-flex justify-content-between align-items-center">
            <div class="contact-info">
                <a href="#"><span>Phone:</span> +673</a>
                <a href="#"><span>Email:</span> .com</a>
            </div>
            <div class="follow-us">
                <span>Follow us</span>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </div>

        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar justify-content-between" id="cleverNav">
					<?php
							if(isset($_GET['role'])){
							$role=$_GET['role'];
							if($role=="Lecturer"){
								$lecturerid=$_GET['lecturerid'];
								$xml = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturerimg =$lecturer->lecturerimg;
								}
								echo"<h5><img src='$lecturerimg' style='border:1px solid #ccc;border-radius:50%; width:35px; height:35px;' alt='Avatar'> LECTURER DASHBOARD</h5>";
							}
							else{
								$studentid=$_GET['studentid'];
								$xml = simplexml_load_file('data/students.xml');
								$students = $xml->xpath('//student[studentid="' . "$studentid" . '"]');
								foreach($students as $student) {
								$studentimg =$student->studentimg;
								}
								echo"<h5><img src='$studentimg' style='border:1px solid #ccc;border-radius:50%; width:35px; height:35px;' alt='Avatar'> STUDENT DASHBOARD</h5>";
							}
							}
							else{
								echo"<h4>Grading System</h4>";
							}
							?>
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
						<?php
							if(isset($_GET['role'])){
							if($role=="Lecturer"){
							$role=$_GET['role'];
							$lecturerid=$_GET['lecturerid'];
							echo"<ul>
                                <li><a href='index1.php?lecturerid=".$lecturerid."&role=".$role."'>Home</a></li>
                                <li><a href='programlist.php?lecturerid=".$lecturerid."&role=".$role."'>Program</a></li>
                                <li><a href='course.php?lecturerid=".$lecturerid."&role=".$role."'>Course</a></li>
                                <li><a href='assessment.php?lecturerid=".$lecturerid."&role=".$role."'>Assessment</a></li>
                                <li><a href='gradelist.php?lecturerid=".$lecturerid."&role=".$role."'>Grade</a></li>
                                <li><a href='feedback.php?lecturerid=".$lecturerid."&role=".$role."'>Feedback</a></li>
                            </ul>";
							}
							else{
							$role=$_GET['role'];
							$studentid=$_GET['studentid'];
							$studentgroup=$_GET['studentgroup'];
							echo"<ul>
                                <li><a href='index1.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>Home</a></li>
                                <li><a href=''>About</a></li>
                                <li><a href='course.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>Courses</a></li>
                                <li><a href='assessment.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>Assessment</a></li>
                                <li><a href='gradelist.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>Grade</a></li>
                                <li><a href='feedback.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."'>Feedback</a></li>
                            </ul>";
							}
							}
							else{
							echo"<ul>
                                <li><a href='index.php'>Home</a></li>
                                <li><a href='about.php'>About</a></li>
                                <li><a href='course.php'>Courses</a></li>
                                <li><a href='grade.php'>Grading</a></li>
                                <li><a href='feedback.php'>Feedback</a></li>
                            </ul>";
							}
						?>
                            
                            <div class="search-area"><?php
							if(isset($_GET['role'])){
							$role=$_GET['role'];
							if($role=="Lecturer"){
							$role=$_GET['role'];
							$lecturerid=$_GET['lecturerid'];
								echo"
                                <form action='searchcourse.php?lecturerid=".$lecturerid."&role=".$role."' method='post'>
                                    <input type='search' name='searchcourse' id='search' placeholder='Search'>
                                    <button type='submit' name='Submit'><i class='fa fa-search' aria-hidden='true'></i></button>
                                </form>";
							}
							else{
							$role=$_GET['role'];
							$studentid=$_GET['studentid'];
							$studentgroup=$_GET['studentgroup'];
								echo"
                                <form action='searchcourse.php?studentid=".$studentid."&role=".$role."&studentgroup=".$studentgroup."' method='post'>
                                    <input type='search' name='searchcourse' id='search' placeholder='Search'>
                                    <button type='submit' name='Submit'><i class='fa fa-search' aria-hidden='true'></i></button>
                                </form>";
							}
							}
							else{
								echo"
                                <form action='searchcourse.php' method='post'>
                                    <input type='search' name='searchcourse' id='search' placeholder='Search'>
                                    <button type='submit' name='Submit'><i class='fa fa-search' aria-hidden='true'></i></button>
                                </form>";
							}
							?>
                            </div>
                            <div class="register-login-area">
								<?php
							if(isset($_GET['role'])){
							$role=$_GET['role'];
							if($role=="Lecturer"){
								echo"<a href='logout.php' class='btn active'>Logout</a>";
							}
							else{
								echo"<a href='logout.php' class='btn active'>Logout</a>";
							}
							}
							else{
								echo"<a href='register.php' class='btn active' >Register</a>
                                <a href='login.php' class='btn active'>Login</a>";
							}
							?>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>