<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grading System</title>
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="style.css">
	<script src="js/index.js"></script>
	<script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>

</head>
<?php 
include 'header.php';
$_SESSION['lecturervalidation']=0;
$_SESSION['studentvalidation']=0;
?>
<body>
   <div id="preloader">
        <div class="spinner"></div>
    </div>
	
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content text-center">
                        <h2>Let's Study Together</h2>
                        <a href="" class="btn clever-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <div class="icon">
                            <img src="img/core-img/docs.png" alt="">
                        </div>
                        <h2><span class="counter">1912</span></h2>
                        <h5>Success Stories</h5>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="icon">
                            <img src="img/core-img/star.png" alt="">
                        </div>
                        <h2><span class="counter">123</span></h2>
                        <h5>Dedicated Tutors</h5>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="750ms">
                        <div class="icon">
                            <img src="img/core-img/events.png" alt="">
                        </div>
                        <h2><span class="counter">89</span></h2>
                        <h5>Scheduled Events</h5>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cool-facts-area text-center mb-100 wow fadeInUp" data-wow-delay="1000ms">
                        <div class="icon">
                            <img src="img/core-img/earth.png" alt="">
                        </div>
                        <h2><span class="counter">56</span></h2>
                        <h5>Available Courses</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <section class="popular-courses-area section-padding-100-0" style="background-image: url(img/core-img/texture.png);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Courses</h3>
                    </div>
                </div>
            </div>

            <div class="row">
               
                    
                      
                        <!-- Course Content -->
						<?php
						$xml= simplexml_load_file("data/courses.xml") or die ("Error: Cannot create object");
								$course = $xml->xpath('/courses/course');
								foreach($course as $child){
								$coursename= $child->coursename;
								$courseid=$child->courseid;
								$courseimg=$child->courseimg;
								$coursedesc=$child->coursedesc;
								$lecturerid=$child->lecturerid;
								$xml1 = simplexml_load_file('data/lecturers.xml');
								$lecturers = $xml1->xpath('//lecturer[lecturerid="' . "$lecturerid" . '"]');
								foreach($lecturers as $lecturer) {
								$lecturername =$lecturer->lecturername;
								}
						
                        echo"<div class='col-12 col-md-6 col-lg-4'>
						<div class='single-popular-course mb-100 wow fadeInUp' data-wow-delay='250ms'>
						<img src='$courseimg' alt=''>
						 
						<div class='course-content'>
                            <h5>$courseid $coursename</h5>
                            <div class='meta d-flex align-items-center'>
                                <a href='#'>$lecturername</a>
                            </div>
                            <p>$coursedesc</p>
                             </div></div></div>";
						}
						?>
                
               

            </div>
        </div>
    </section>

    <section class="upcoming-events section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Upcoming events</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="250ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/bg-img/e1.jpg" alt="">
                            <h6 class="event-date">August 26</h6>
                            <h4 class="event-title">Networking Day</h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> August 26 @ 9:00 am</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Upcoming Events -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="500ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/bg-img/e2.jpg" alt="">
                            <h6 class="event-date">August 7</h6>
                            <h4 class="event-title">Open Doors Day</h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> August 7 @ 9:00 am</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-upcoming-events mb-50 wow fadeInUp" data-wow-delay="750ms">
                        <!-- Events Thumb -->
                        <div class="events-thumb">
                            <img src="img/bg-img/e3.jpg" alt="">
                            <h6 class="event-date">August 3</h6>
                            <h4 class="event-title">Creative Leadership</h4>
                        </div>
                        <!-- Date & Fee -->
                        <div class="date-fee d-flex justify-content-between">
                            <div class="date">
                                <p><i class="fa fa-clock"></i> August 3 @ 9:00 am</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
<footer class="footer-area">
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-logo">
                            <a href="index.html">Grading System</a>
                        </div>
                    <p><a href="#">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by Shahril&Ahsan</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>