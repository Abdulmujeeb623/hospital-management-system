<?php include("aishat_nav.php");?>
<main id="main">

<!-- Booking Section Start -->
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
<section id="support" class="wow fadeInUp">
    <div class="container">
        <h1>
            Need help? Call me 24/7 at +1-234-567-8900
        </h1>
    </div>
</section>
<!-- Support Section end -->

</main>
<?php include("aishat_footer.php");?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script>
new Vue({
    el: '#main',
    data: {
        formData: {
            name: '',
            email: '',
            phoneNumber: '',
            dateOfBirth: '',
            time: '',
            request: '',
            
        },
        validationErrors: {
            name: '',
            email: '',
            phoneNumber: '',
            dateofBirth: '',
            time: '',
            request: '',
            
        }
    },
    methods: {
    validateForm: function (event) {
        event.preventDefault(); // Prevent the form from submitting

        let valid = true;

        // Name validation
        if (!this.formData.name) {
            this.validationErrors.name = "Name is required";
            valid = false;
            alert(this.validationErrors.name);
        } else {
            this.validationErrors.name = '';
        }

        // Email validation
        if (!this.formData.email) {
            this.validationErrors.email = "Email is required";
            valid = false;
            alert(this.validationErrors.email);
        } else {
            this.validationErrors.email = '';
        }

        // Password validation
        if (!this.formData.phoneNumber) {
            this.validationErrors.phoneNumber = "Phone number is required";
            valid = false;
            alert(this.validationErrors.phoneNumber);
        } else {
            this.validationErrors.phoneNumber = '';
        }
        
        if (!this.formData.dateOfBirth) {
            this.validationErrors.dateOfBirth = "Appointment date is required";
            valid = false;
            alert(this.validationErrors.dateOfBirth);
        } else {
            this.validationErrors.dateOfBirth = '';
        }
        if (!this.formData.time) {
            this.validationErrors.time = "time is required";
            valid = false;
            alert(this.validationErrors.time);
        } else {
            this.validationErrors.time = '';
        }
        
        // Genotype validation (you can add your validation logic here)

        // Blood Group validation (you can add your validation logic here)

        // Medical History validation (you can add your validation logic here)

        // Date of Birth validation (you can add your validation logic here)

        // Phone number validation
        if (this.formData.phoneNumber.length < 14) {
            this.validationErrors.phoneNumber = "Phone number should be at least 14 characters long";
            valid = false;
            alert(this.validationErrors.phoneNumber);
        } else {
            this.validationErrors.phoneNumber = '';
        }

        if (valid) {
            // If the form is valid, you can submit it here
            event.target.submit();
        }
    },
}

});
</script>


