<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

include("ai_nav.php");
$current_time = date('h:i:s A'); // Example: 03:25:45 PM
?>


<main id="main">
<center><h4>Welcome, <?php echo $_SESSION['name']; ?>!</h4></center>

 <center><p><?php echo $current_time; ?></p><center>


 <div class="row">
            <div class="col-md-6 mb-4">
                <div class="p-4 border">
                    <h1>Medical</h1>
                    <h4>ADULTS & CHILDREN</h4>
                    <h3><a href="ai_appoint.php" class="btn btn-secondary">See a provider</a></h3> 
                     <h3><a href="ai_appoint.php" class="btn btn-secondary">Book an appointment</a></h3>
                    <p>Top issues our board-certified providers can treat:</p>
                    <ul>
                        <li>Colds, Coughs, Congestion</li>
                        <li>UTIs</li>
                        <li>Skin Issues & Rashes</li>
                        <li>Sinus Infections</li>
                    </ul>
                    <h3><a href="ai_dashboard.php" class="btn btn-secondary">Learn more</a></h3>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="p-4 border">
                    <h1>Surgery</h1>
                    <h4>ADULTS & CHILDREN</h4>
                    <h3><a href="ai_appoint.php" class="btn btn-secondary">See a provider</a></h3> 
                     <h3><a href="ai_appoint.php" class="btn btn-secondary">Book an appointment</a></h3>
                    <p>Top issues our board-certified providers can treat:</p>
                    <ul>
                        <li>Colds, Coughs, Congestion</li>
                        <li>UTIs</li>
                        <li>Skin Issues & Rashes</li>
                        <li>Sinus Infections</li>
                    </ul>
                    <h3><a href="ai_dashboard.php" class="btn btn-secondary">Learn more</a></h3>
                </div>
            </div>
</div>
s
    
    

<section id="booking">
    <div class="container">
        <div class="section-header">
            <h3>Book for Getting Services</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="booking-form">
                <form method="post" action="ai_booking2.php" @submit="validateForm" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Your Name" v-model="formData.name" name="name">
                                <span class="text-danger">{{ validationErrors.name }}</span>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>email</label>
                                <input type="email" class="form-control" placeholder="Your Email" v-model="formData.email" name="email">
                                <span class="text-danger">{{ validationErrors.email }}</span>
                           
                            </div>
                            <div class="control-group">
                            <label>Phone number</label>
                            <input type="text" class="form-control" placeholder="Phone number" v-model="formData.phoneNumber" name="phoneNumber">
                            <span class="text-danger">{{ validationErrors.phoneNumber }}</span>
                            </div>
                            <div class="control-group col-sm-6">
                                <label>Select a Service</label>
                                <select class="custom-select" name="service">
                                    <option value="">Consultation</option>
                                    <option>Health Checkup</option>
                                    <option>Flu Shots</option>
                                    <option>Blood Test</option>
                                    <option>Physical Exams</option>
                                    <option>Prevention</option>
                                    <option>Family Planning</option>
                                    <option>Home Visits</option>
                                    <option>Insurance</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="control-group col-sm-6">
                                <label>Appointment Date</label>
                                <input type="date" class="form-control" v-model="formData.dateOfBirth" name="dateOfBirth">
                            <span class="text-danger">{{ validationErrors.dateOfBirth }}</span>

                            </div>
                            <div class="control-group col-sm-6">
                                <label>Appointment Time</label>
                                <input type="time" class="form-control datetimepicker-input" id="time" v-model="formData.time" name="time" data-toggle="datetimepicker" data-target="#time" placeholder="E.g. HH:MM AM" />
                                <span class="text-danger">{{ validationErrors.time }}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label>Special Request</label>
                            <input type="text" class="form-control" placeholder="E.g. Special Request" v-model="formData.request" name="request" />
                            <span class="text-danger">{{ validationErrors.request }}</span>
                        </div>
                        

                    <div class="button"><button type="submit">Book Now</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Booking Section End -->


<!-- Services Section Start -->
<section id="services">
    <div class="container">
        <header class="section-header">
            <h3>Services</h3>
        </header>
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-1"></div>
                    <h4>Consultation</h4>
                    <span>20 Min | $50.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-2"></div>
                    <h4>Health Checkup</h4>
                    <span>30 Min | $30.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-3"></div>
                    <h4>Surgery</h4>
                    <span>10 Min | $15.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-4"></div>
                    <h4>Gynecology</h4>
                    <span>30 Min | $10.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-5"></div>
                    <h4>Physical Exams</h4>
                    <span>30 Min | $50.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-6"></div>
                    <h4>Prevention</h4>
                    <span>10 Min | $20.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-7"></div>
                    <h4>Family bookings</h4>
                    <span>30 Min | $20.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="single-service">
                    <div class="icon icon-8"></div>
                    <h4>Home Visits</h4>
                    <span>30 Min | $30.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 d-sm-none d-md-block d-lg-none">
                <div class="single-service">
                    <div class="icon icon-9"></div>
                    <h4>Insurance</h4>
                    <span>10 Min | $100.00</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="booking.html">Book Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End-->

<!-- Team Section Start -->
<section id="team">
    <div class="container">
        <div class="section-header">
            <h3>Meet My Assistant</h3>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box8">
                    <img src="img/team-1.jpg" alt="">
                    <div class="box-content">
                        <ul class="icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                </div>
                <h4>Abdulmujeeb Otuyo</h4>
                <span>Biomedical engineer</span>
                <p>
                    Lorem ipsum dolor sit amet adipiscing elit. Proin consequat cursus sit amet elit proin consequat.
                </p>
            </div>
            
            <div class="col-md-4">
                <div class="box8">
                    <img src="img/team-2.jpg" alt="">
                    <div class="box-content">
                        <ul class="icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                </div>
                <h4>Otuyo Mujeebat</h4>
                <span>Medical biologist</span>
                <p>
                    Lorem ipsum dolor sit amet adipiscing elit. Proin consequat cursus sit amet elit proin consequat.
                </p>                     
            </div>

            <div class="col-md-4">
                <div class="box8">
                    <img src="img/team-3.jpg" alt="">
                    <div class="box-content">
                        <ul class="icon">
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-pinterest"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                        </ul>
                    </div>
                </div>
                <h4>Michael C. Powell</h4>
                <span>Assistant Nurse</span>
                <p>
                    Lorem ipsum dolor sit amet adipiscing elit. Proin consequat cursus sit amet elit proin consequat.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Team Section End -->
<!-- Contact Section Start -->
<section id="contact" class="section-bg wow fadeInUp">
    <div class="container">
        <div class="section-header">
            <h3>Contact Us</h3>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="contact-detail">
                    <div class="contact-hours">
                        <h4>Opening Hours</h4>
                        <p>Monday-Friday: 9am to 7pm</p>
                        <p>Saturday: 9am to 4pm</p>
                        <p>Sunday: Closed</p>
                    </div>
                    
                    <div class="contact-info">
                        <h4>Contact Info</h4>
                        <p>4137  State Street, CA, USA</p>
                        <p><a href="tel:+1-234-567-8900">+1-234-567-8900</a></p>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" required="required" />
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" required="required" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Message" required="required" ></textarea>
                        </div>
                        <div><button type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact end -->

<!-- Subscriber Section Start -->
<section id="subscriber">
    <div class="container">
        <h3>Get Free Consultation</h3>
        <form class="form-inline">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email Goes Here">
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</section>
<!-- Subscriber Section end -->

<!-- Support Section Start -->
<section id="support">
    <div class="container">
        <h1>
            Need help? Call me 24/7 at +1-234-567-8900
        </h1>
    </div>
</section>
<!-- Support Section end -->

</main>


<?php include("aishat_footer.php");?>
<?php include("ai_book.php");?>