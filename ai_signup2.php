<?php
include("aishat_nav.php");

// Function to validate user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $password1 = test_input($_POST["password1"]);
    $password2 = test_input($_POST["password2"]);
    $genotype = test_input($_POST["genotype"]);
    $bloodGroup = test_input($_POST["bloodGroup"]);
    $medicalHistory = test_input($_POST["medicalHistory"]);
    $dateOfBirth = test_input($_POST["dateOfBirth"]);
    $phoneNumber = test_input($_POST["phoneNumber"]);

    // You can save the data to the database here

    // Example database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to insert data into the database
    $sql = "INSERT INTO user (full_name, email, pass1, pass2, geno, pheno, medics, birth, phone_number)
            VALUES ('$name', '$email', '$password1', '$password2', '$genotype', '$bloodGroup', '$medicalHistory', '$dateOfBirth', '$phoneNumber')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Account successfully created!'); window.location='ai_login.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php include("aishat_footer.php"); ?>
