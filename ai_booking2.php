<?php

class BookingHandler {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "clinic");

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function insertBooking($name, $email, $mobile, $service, $apd, $apt, $request) {
        $name = $this->testInput($name);
        $email = $this->testInput($email);
        $mobile = $this->testInput($mobile);
        $service = $this->testInput($service);
        $apd = $this->testInput($apd);
        $apt = $this->testInput($apt);
        $request = $this->testInput($request);

        $sql = "INSERT INTO booking (full_name, email, mobile, service, apd, apt, request) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("sssssss", $name, $email, $mobile, $service, $apd, $apt, $request);

        if ($stmt->execute()) {
            echo "<script>alert('Account successfully created!'); window.location='ai_booking.php'</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $this->db->close();
    }

    private function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $handler = new BookingHandler();

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["phoneNumber"];
    $service = $_POST["service"];
    $apd = $_POST["dateOfBirth"];
    $apt = $_POST["time"];
    $request = $_POST["request"];

    $handler->insertBooking($name, $email, $mobile, $service, $apd, $apt, $request);
}
?>
