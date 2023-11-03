<?php include("aishat_nav.php");?>
<main id="main">

    <!-- Login Section Start -->
    <section id="login">
        <div class="container">
            <div class="section-header">
                <h3>Signup</h3>
            </div>

            <div class="row justify-content-center"> <!-- Center the form horizontally -->
                <div class="col-md-6 form">
                <form method="post" action="ai_signup2.php" @submit="validateForm" enctype="multipart/form-data">

                        <label for="registrationForm">User Registration</label> <!-- Label for the form -->
                        <div class="form-row mb-3"> <!-- Add margin-bottom to the form rows -->
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name" v-model="formData.name" name="name">
                                <span class="text-danger">{{ validationErrors.name }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email" v-model="formData.email" name="email">
                                <span class="text-danger">{{ validationErrors.email }}</span>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Your Password" v-model="formData.password1" name="password1">
                                <span class="text-danger">{{ validationErrors.password1 }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="password" class="form-control" placeholder="Repeat Your Password" v-model="formData.password2" name="password2">
                                <span class="text-danger">{{ validationErrors.password2 }}</span>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Genotype" v-model="formData.genotype" name="genotype">
                                <span class="text-danger">{{ validationErrors.genotype }}</span>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Blood Group" v-model="formData.bloodGroup" name="bloodGroup">
                                <span class="text-danger">{{ validationErrors.bloodGroup }}</span>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Medical History" v-model="formData.medicalHistory" name="medicalHistory">
                            <span class="text-danger">{{ validationErrors.medicalHistory }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="date" class="form-control" v-model="formData.dateOfBirth" name="dateOfBirth">
                            <span class="text-danger">{{ validationErrors.dateOfBirth }}</span>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" placeholder="Phone number" v-model="formData.phoneNumber" name="phoneNumber">
                            <span class="text-danger">{{ validationErrors.phoneNumber }}</span>
                        </div>
                        
                        <button type="submit">Sign Up</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
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
            password1: '',
            password2: '',
            genotype: '',
            bloodGroup: '',
            medicalHistory: '',
            dateOfBirth: '',
            phoneNumber: ''
        },
        validationErrors: {
            name: '',
            email: '',
            password1: '',
            password2: '',
            genotype: '',
            bloodGroup: '',
            medicalHistory: '',
            dateOfBirth: '',
            phoneNumber: ''
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
        if (!this.formData.password1) {
            this.validationErrors.password1 = "Password is required";
            valid = false;
            alert(this.validationErrors.password1);
        } else {
            this.validationErrors.password1 = '';
        }
        if (this.formData.password1.length < 10) { // Corrected the condition
            this.validationErrors.password1 = "Password should be at least 10 characters long";
            valid = false;
            alert(this.validationErrors.password1);
        } else {
            this.validationErrors.password1 = '';
        }

        if (this.formData.password1 !== this.formData.password2) {
            this.validationErrors.password2 = "Passwords do not match";
            valid = false;
            alert(this.validationErrors.password2);
        } else {
            this.validationErrors.password2 = '';
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
