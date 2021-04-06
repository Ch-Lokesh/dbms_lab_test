<!DOCTYPE html>
<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
include("config/configure.php");
include("user_header.php");

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
    <title>posticle</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles/posticles.css">
</head>
<style>
    body {
        background-image: url('../images/MegaTron.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        overflow-x: hidden;
    }

    .comment {
        border: 2px solid gray;
        border-radius: 20px;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-top: 5px;
    }

    .des {
        font-size: 18px;
    }
</style>

<body>
    <form action="" method="post" role="form" enctype="multipart/form-data" class="form horizontal">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary btn-block form-control" name="accept_req">Accept Request</button>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary btn-block form-control" name="delete_req">Delete Request</button>
            </div>
        </div>

        <?php
        if (isset($_POST['accept_req'])) {
            $req_id = $_GET['req_id'];
            $status = 1;
            $update = "UPDATE requests set status='$status'  WHERE req_id='$req_id'";
            $run = mysqli_query($con, $update);
            if ($run) {

                $req_id = $_GET['req_id'];
                echo "<script>alert('Accepted')</script>";
                $select_req = "SELECT * from requests where req_id='$req_id'";
                $run_requests = mysqli_query($con, $select_req);
                $row_requests = mysqli_fetch_array($run_requests);
                $post_id = $row_requests['post_id'];
                $host_id = $row_requests['host_id'];
                $req_user_id = $row_requests['req_user_id'];

                $insert_history = "INSERT INTO history (post_id, host_id, user_id) values('$post_id', '$host_id', '$req_user_id')";
                mysqli_query($con, $insert_history);

                $select_cur = "SELECT * from posts where post_id='$post_id'";
                $run_cur = mysqli_query($con, $select_cur);
                $row = mysqli_fetch_array($run_cur);
                $cur_collabs = $row['cur_collabs'];
                $total_collabs = $row['total_collabs'];



                if ($total_collabs == $cur_collabs + 1) {
                    $del = "DELETE posts where post_id='$post_id'";
                    mysqli_query($con, $del);
                } else {
                    $cur_collabs = $cur_collabs + 1;
                    $update = "UPDATE posts SET cur_collabs = '$cur_collabs' where post_id='$post_id'";
                    mysqli_query($con, $update);
                }


                echo "<script>window.open('user_home.php', '_self')</script>";
            }
        }
        if (isset($_POST['delete_req'])) {
            $req_id = $_GET['req_id'];
            $update = "DELETE requests WHERE req_id='$req_id'";
            $run = mysqli_query($con, $update);
            if ($run) {
                echo "<script>alert('DELETED')</script>";
                echo "<script>window.open('user_home.php', '_self')</script>";
            }
        }
        ?>
    </form>
</body>


</html>