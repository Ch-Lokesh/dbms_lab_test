<?php
$con = mysqli_connect("localhost", "root", "", "lab_test") or die("connectoin was not established");

if (!$con) {
    echo ("connection error" . mysqli_connect_error());
}
