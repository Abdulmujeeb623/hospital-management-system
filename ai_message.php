<?php
session_start();

// Check if the 'name' session variable is set
if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

// Include header/navigation
include("ai_nav2.php");

// Get the current time
$current_time = date('h:i:s A'); // Example: 03:25:45 PM
?>

<main id="main">
    <div class="text-center">
        <h4>Welcome, <?php echo $_SESSION['name']; ?>!</h4>
        <p><?php echo $current_time; ?></p>
    </div>
    <section id="contact" class="section-bg wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h3>Message Us</h3>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <form action="ai_question2.php" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <textarea class="form-control" name="question" id="question" rows="3" required=""></textarea>
                            </div>
                        </div>
                        <div><button type="submit" class="btn btn-primary">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
// Include footer and other necessary files
include("aishat_footer.php");
include("ai_book.php");
?>
