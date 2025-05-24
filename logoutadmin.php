<?php
session_start();
$_SESSION["umail"] = ""; // Corrected assignment
unset($_SESSION["umail"]); // Properly unsetting a specific session variable

header('Location: index.php');
exit(); // Ensures the script stops execution after redirection
?>
