<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

include("ai_nav.php");
$current_time = date('h:i:s A'); // Example: 03:25:45 PM
?>

<?php
class DatabaseHandler {
    private $connection;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
        // Create a database connection
        $this->connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function fetchResults() {
        // Modify your query to fetch data for the specific student
        $query = "SELECT full_name, email, mobile, service, apd, apt, request FROM booking WHERE email = ? ORDER BY request ASC";


        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $_SESSION['name']);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();

        return $data;
    }
}

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "clinic";

$dbHandler = new DatabaseHandler($dbHost, $dbUser, $dbPass, $dbName);
$results = $dbHandler->fetchResults();
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
                    <h3><a href="ai_appoint.php" class="btn btn-secondary">Scehdule an appointment</a></h3> 
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


<!-- Booking Section Start -->
<section id="booking">
    <div class="container">
        <div class="section-header">
            <h3>Book for Getting Services</h3>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="booking-form">
                <form method="post" action="ai_appoint2.php" @submit="validateForm" enctype="multipart/form-data">
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
<section id="booking">
    <div class="table-responsive px-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Phone number</th>
                    <th>Service</th>
                    <th>Appointment date</th>
                    <th>Appointment time</th>
                    <th>Special request</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= $result['full_name'] ?></td>
                        <td><?= $result['mobile'] ?></td>
                        <td><?= $result['service'] ?></td>
                        <td><?= $result['apd'] ?></td>
                        <td><?= $result['apt'] ?></td>
                        <td><?= $result['request'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
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
<?php include("ai_book.php");?>