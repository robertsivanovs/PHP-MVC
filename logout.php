<?php
// Destroys session and redirects user
session_start();
session_destroy();
header("Location: ./");
?>