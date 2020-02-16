<?php
// Checks if session variables were set
if(!isset($_SESSION)) { 
    session_start(); 
} if (empty($_SESSION['loggedin'])){
    Header("Location: ./");
} else if ($_SESSION['loggedin'] != 'true'){
    Header("Location: ./");
}
$username = $_SESSION['username']; // Sets username to be displayed below:
?>

<!-- View that users get when they have successfully logged-in/registered -->
<html>
<head>
<title> Welcome! </title>
</head>
<body>
<h1> Success! Enjoy your stay! </h1>
<h3> Welcome <?php echo htmlspecialchars($username); ?> </h3>
<a href ="../logout.php">Log-out</a>
<p> Random content </p>
</body>
</html>