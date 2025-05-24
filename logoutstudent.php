<?php
session_start();
$_SESSION["sidx"] = ""; // Corrected assignment
session_unset(); // This clears all session variables
session_destroy(); // This destroys the session
header('Location: index.php'); // Ensure correct redirection
exit(); // Ensure no further execution after redirection
?>
