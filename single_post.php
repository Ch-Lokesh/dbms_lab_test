<!DOCTYPE html>
<?php

session_start();

if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
include("config/configure.php");
include("user_header.php");

function single_posticle()
{
    //echo "called";
    global $con;
    if (isset($_GET['post_id'])) {
        $post_id = $_GET['post_id'];

        $get_post = "SELECT * FROM posts where post_id='$post_id'";
        $run_post = mysqli_query($con, $get_post);
        $row_post = mysqli_fetch_array($run_post);

        $header = $row_post['header'];
        $content = $row_post['content'];
        $time = $row_post['time'];
        $total_collabs = $row_post['total_collabs'];
        $cur_collabs = $row_post['cur_collabs'];
        $creator = $row_post['host_id'];

        $select_creator = "SELECT * FROM users where user_id='$creator'";
        $run_creator = mysqli_query($con, $select_creator);
        $row = mysqli_fetch_array($run_creator);
        $first_name = $row['first_name'];

        echo "
        <div class='container-fluid'>
            <div class='article'>
                <div class='row'>
                    <div class='col-sm-12'>
                        <center><h2>$header</h2></center>
                    </div>
                </div>
                 <hr id='hl' > 
                
                <div class='row content'>
                    <div class='col-sm-2'>
                    </div>
                    <div class='col-sm-8'>
                        $content
                    </div>  
                    <div class='col-sm-2'>
                    </div>
                </div>
                <div class='row time'>
                    <div class='col-sm-2'><strong>Created by</strong>  $first_name</div>
                    <div class='col-sm-1'></div>
                    <div class='col-sm-3'><strong>Collaborators need</strong>  $total_collabs</div>
                    <div class='col-sm-1'></div>
                    <div class='col-sm-3'><strong>Current Collaborators</strong>  $cur_collabs</div>
                    <div class='col-sm-3'><strong>Created at</strong>  $time </div>
                </div>
            </div>
            </br>
        </div>
        </br>
        ";
    }
}


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
    <div class="container-fulid">
        <div class="row">
            <div class="col-sm-12">
                <center>
                    <h2>Post</h2>
                </center>
            </div>
        </div>
        <?php echo single_posticle(); ?>

        <form action="" method="post" role="form" enctype="multipart/form-data" class="form horizontal">
            <center>
                <h2>Send Request to Collaborate</h2>
            </center>

            <div class="form-group row">
                <label for="Answer" class="col-sm-4 control-label">Make Request</label>
                <div class="col-sm-8">
                    <textarea type="text" id="answer" name="request" class="form-control" rows='4' cols='50' required></textarea>
                </div>
            </div>
            <center><button style="width:100px;" type="submit" class="btn btn-primary btn-block form-control" name="submit_req">Submit</button></center>

            <?php
            if (isset($_POST['submit_req'])) {
                $email = $_SESSION['email'];
                $current_user = "SELECT * from users WHERE email='$email'";
                $run_current_user = mysqli_query($con, $current_user);
                $rows_current_user = mysqli_fetch_array($run_current_user);
                $req_user_id = $rows_current_user['user_id'];

                $post_id = $_GET['post_id'];
                $des = htmlentities(mysqli_real_escape_string($con, $_POST['request']));
                $get_post = "SELECT * FROM posts where post_id='$post_id'";
                $run_post = mysqli_query($con, $get_post);
                $row_post = mysqli_fetch_array($run_post);
                $host_id = $row_post['host_id'];

                $insert = "INSERT INTO requests (post_id, host_id, req_user_id, des) 
                            VALUES              ('$post_id','$host_id', '$req_user_id', '$des')";

                $res = mysqli_query($con, $insert);

                if ($res) {
                    echo "<script>echo('Request Sent')</script>";
                } else {
                    echo "<script>echo('Error')</script>";
                }
            }
            ?>
        </form>
    </div>
    <br><br>
</body>


</html>