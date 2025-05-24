<?php
session_start();
$_SESSION["fidx"] = ""; // Corrected assignment
session_unset(); // Clears all session variables
session_destroy(); // Destroys the session completely
header('Location: index.php'); // Ensures correct redirection
exit(); // Prevents further execution
?>
