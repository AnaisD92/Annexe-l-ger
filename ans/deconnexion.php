<?php
// Start session
session_start();

// Destroy all session data
$_SESSION = array();
session_destroy();

// Redirect to the homepage
header('Location: index.php');
exit;
?>
