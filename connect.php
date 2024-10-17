<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = 'zarinmim5!';
$DATABASE = 'signupforms';

$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if ($con) {
    echo "Connection successful";
} else {
    die("Connection failed: " . mysqli_connect_error());
}
