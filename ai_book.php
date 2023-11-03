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


