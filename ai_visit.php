<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

include("ai_nav2.php");
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

<section id="booking">
<div class="table-responsive">
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
            <br>
            <br><br><br><br><br>
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
