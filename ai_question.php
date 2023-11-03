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
    
    public function addComment($questionId, $comment) {
        $comment = $this->test_input($comment);
        $query = "INSERT INTO comment (question_id, comment) VALUES (?, ?)";
    
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("is", $questionId, $comment);
        
        if ($stmt->execute()) {
            $stmt->close();
            return "Inserted successfully";
        } else {
            // Handle the error here
            return "Error: Comment not added.";
        }
    }

    public function getQuestionsAndComments() {
        $query = "SELECT q.user_name, c.comment FROM questions q LEFT JOIN comment c ON q.id = c.question_id ORDER BY q.created_at DESC"; // Use the correct table names
        $result = $this->db->query($query);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
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
    if (isset($_POST['comment']) && isset($_POST['question_id'])) {
        // Handle doctor's comment submission
        $questionId = $_POST['question_id'];
        $comment = $_POST['comment'];
    
        $message = $doctorUserSystem->addComment($questionId, $comment);
    
        if ($message === "Inserted successfully") {
            echo "Comment inserted successfully.";
        } else {
            echo $message;
        }
    }
}

// Display questions and comments
$doctorUserSystem = new DoctorUserSystem();
$data = $doctorUserSystem->getQuestionsAndComments();

// ...
?>
