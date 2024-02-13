<?php
$conn = mysqli_connect('localhost', 'root', '', 'job');
    var_dump($_POST);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
