<?php

include("config/configure.php");
if (isset($_POST['user_sign_up'])) {
    $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
    $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
    $user_email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $user_email1 = htmlentities(mysqli_real_escape_string($con, $_POST['user_email1']));
    $user_pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $user_pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass1']));
    // $age = 80;


    if ($user_email1 != $user_email) {
        echo "<script>alert('Email did not match')</script>";
        exit();
    }
    if ($user_pass != $user_pass1) {
        echo "<script>alert('Password did not match')</script>";
        exit();
    }


    $check_email = "select * from users where email = '$user_email'";
    $run_check_email = mysqli_query($con, $check_email);
    $rows = mysqli_num_rows($run_check_email);
    if ($rows > 0) {
        echo "<script>alert('This email already taken')</script>";
        exit();
    }

    $insert = "insert into users (first_name, last_name, email, password) values('$first_name', '$last_name','$user_email', '$user_pass') ";

    $insert_query = mysqli_query($con, $insert);
    if ($insert_query) {
        echo "<script>alert('$first_name, your registration is completed')</script>";
    } else {
        echo "<script>alert('Bad Luck')</script>";
        exit();
    }
}
