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
</div>

</main>


 <?php include("aishat_footer.php");?>
<?php include("ai_book.php");?>