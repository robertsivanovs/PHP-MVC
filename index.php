<?php

if (file_exists('routes.php')) {
    include 'routes.php';
} else {
    echo "Woops, something went wrong! routes.php cannot be loaded!";
}