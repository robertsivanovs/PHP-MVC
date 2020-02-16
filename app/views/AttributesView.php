<?php
        // Check if form was posted
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            Header("Location: ./");
        }
?>

<!-- View user gets when attributes have been inserted into table -->
<html>
<head>
<title> Success! </title>
</head>
<body>
 <h1> Attribiutes have been added successfully: </h1>
 <h2> Your attributes have been inserted into database! </h2>
 <a href ="../app/attributes_task/">Back </a>
 </body>
</html>