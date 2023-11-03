<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: ai_login.php');
    exit();
}

include("ai_nav2.php");
$current_time = date('h:i:s A'); // Example: 03:25:45 PM
?>

<main id="main">

    <center><h4>Welcome, <?php echo $_SESSION['name']; ?>!</h4></center>

    <center><p><?php echo $current_time; ?></p></center>

    <!-- Add an iframe to display the map -->
    <iframe
        width="600"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?q=pharmacy&key=AIzaSyDhGe7xLhhIjvJp2EZ7TwqoojTu-IKn5Uo">
    </iframe>

    <?php include("aishat_footer.php"); ?>
    <?php include("ai_book.php"); ?>

</main>
