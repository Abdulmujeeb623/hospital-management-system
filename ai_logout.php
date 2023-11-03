<?php
session_start();
session_destroy();
header('Location: ai_login.php');
exit();
?>
