<?php
// Check if form was posted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Header("Location: ./");
}
?>
<!-- If input validation, login, register fails then controllers will genereate this view for user -->
<html>

<head>
    <title> Failed </title>
</head>

<body>
    <h1> Action Failed: </h1>
    <h3><?php echo Validator::showErrors(); ?> </h3>
    <a href='../'>Back</a>
</body>

</html>