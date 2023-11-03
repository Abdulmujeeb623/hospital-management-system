<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

class DatabaseHandler {
    private $connection;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
        // Create a database connection
        $this->connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function fetchResults($username) {
        // Modify query to fetch specific columns for the patients based on username
        $query = "SELECT full_name, email, geno, pheno, medics, birth, phone_number FROM user WHERE email = ? LIMIT 1";
    
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("s", $_SESSION['name']);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $data = array();
    
        if ($row = $result->fetch_assoc()) {
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
$results = $dbHandler->fetchResults($_SESSION['name']);
?>

<?php include('ai_nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Additional inline styles can be added here */
        .profile-picture {
            max-width: 200px;
            height: auto;
            border: 5px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        
        .profile-info h1 {
            font-size: 24px;
        }
        
        .profile-info p {
            font-size: 18px;
            margin: 10px 0;
        }
        
        .additional-section {
            background-color: #f8f8f8;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <?php
            if (!empty($results)) {
                $file_name = $results[0]['File_name'];
                echo "<img src='upload/$file_name' alt='Profile Picture' class='profile-picture'>";
            }
            ?>
        </div>
        <div class="col-md-8 profile-info">
            <?php foreach ($results as $result): ?>
                <h1><?php echo $result['full_name'] . ' ' . $result['full_name']; ?></h1>
                <p>Email: <?php echo $result['email']; ?></p>
                <p>Genotype: <?php echo $result['geno']; ?></p>
                <p>Blood group: <?php echo $result['pheno']; ?></p>
                <p>Health condition: <?php echo $result['medics']; ?></p>
            <?php endforeach; ?>
            <a href="cr_edit_profile2.php">Edit Profile</a>
        </div>
    </div>
</div>

<div class="container mt-4 additional-section">
    <div class="row">
        <div class="col-md-12">
            <!-- Add more sections here if needed -->
            <?php foreach ($results as $result): ?>
                <h1><?php echo $result['full_name'] . ' ' . $result['full_name']; ?></h1>
                <p>Email: <?php echo $result['email']; ?></p>
                <p>Phone number: <?php echo $result['phone_number']; ?></p>
                <p>Date of birth: <?php echo $result['birth']; ?></p>
                <p>Health condition: <?php echo $result['medics']; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Additional Sections (you can add more as needed) -->
<div class="row mt-4">
    <div class="col-md-12">
        <!-- Add more sections here if needed -->
    </div>
</div>
</div>
<?php include('aishat_footer.php'); ?>
</body>
</html>
