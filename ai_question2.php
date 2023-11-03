<?php
session_start();
class DoctorUserSystem {
    private $db;

    public function __construct() {
        // Replace with your database credentials
        $this->db = new mysqli('localhost', 'root', '', 'clinic');

        // Check for a successful connection
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    // Function to safely test and sanitize input
    private function test_input($input) {
        $input = trim($input);
        $input = $this->db->real_escape_string($input);
        return $input;
    }

    public function addQuestion($name, $question) {
        $question = $this->test_input($question);
        $query = "INSERT INTO questions (user_name, question) VALUES (?, ?)";
    
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ss", $_SESSION['name'], $question);
        
        if ($stmt->execute()) {
            $stmt->close();
            return "Inserted successfully";
        } else {
            // Handle the error here
            return "Error: Question not added.";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctorUserSystem = new DoctorUserSystem();

    if (isset($_POST['question'])) {
        // Handle user's question submission
        if (isset($_SESSION['userid'])) {
            $question = $_POST['question'];
            $name = $_SESSION['name'];
    
            $message = $doctorUserSystem->addQuestion($userId, $question);
    
            if ($message === "Inserted successfully") {
                echo "Question inserted successfully.";
            } else {
                echo $message;
            }
        }
    } 
}
// Display questions and comments
$doctorUserSystem = new DoctorUserSystem();

