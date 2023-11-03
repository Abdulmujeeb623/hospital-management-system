<?php session_start(); ?>
<?php

error_reporting(0);

class Database {
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->conn = new mysqli($host, $username, $password, $database);
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class Authentication {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    private function testInput($x) {
        $x = trim($x);
        $x = stripslashes($x);
        $x = htmlspecialchars($x);
        return $x;
    }

    public function authenticate($name, $password) {
        $conn = $this->db->getConnection();
        $name = $this->testInput($name);
        $password = $this->testInput($password);

        $sql = "SELECT * FROM user WHERE email=? AND pass1=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $password);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows) {
                $_SESSION['name'] = $name;
                header('Location: ai_dashboard.php');
                exit();
            } else {
                $error = "Wrong email and/or password"; // Store the error message
            }
        }
        
        $stmt->close();
        return $error ?? null; // Return the error message if set, or null if authentication succeeded
    }
}

$database = new Database("localhost", "root", "", "clinic");
$auth = new Authentication($database);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['email'];
    $password = $_POST['password'];
    
    if (!empty($name) && !empty($password)) {
        $error = $auth->authenticate($name, $password);
    }

    $database->closeConnection();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <?php include("aishat_nav.php");?>
    <main id="main">
        <!-- Login Section Start -->
        <section id="login">
            <div class="container">
                <div class="section-header">
                    <h3>Login</h3>
                </div>
                
                <div class="col-md-6 form">
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Please enter your email" class="form-control" title="Enter your email" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="password" placeholder="~~~~~~~~~~" title="Enter your password" required />
                            <span class="show-password" id="showPasswordText">Show Password</span>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember2">
                                <label class="custom-control-label" for="remember2">Remember me</label>
                            </div>
                        </div>
                        <div><button type="submit">Sign In</button></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- Login Section end -->
        
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
        const showPasswordText = document.getElementById("showPasswordText");
        const passwordInput = document.getElementById("password");

        showPasswordText.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordText.textContent = "Hide Password";
            } else {
                passwordInput.type = "password";
                showPasswordText.textContent = "Show Password";
            }
        });
    </script>
</body>
</html>
