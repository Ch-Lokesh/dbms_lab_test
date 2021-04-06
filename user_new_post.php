<!DOCTYPE html>
<html>
<?php session_start();
include("user_header.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <link rel="stylesheet" type="text/css" href="../styles/insert_descriptive.css">
</head>



<body>

    <div class="container-fluid reg-form">
        <form action="" method="post" enctype="multipart/form" role="form" class="form-horizontal">
            <h2>Create New Post</h2>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="firstName" class="col-sm-4 control-label">Post header</label>
                </div>

                <div class="col-sm-8">
                    <input type="text" id="question" name="art_header" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="firstName" class="col-sm-4 control-label">Post Content</label>
                </div>
                <div class="col-sm-8">
                    <textarea name="art_content" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <label for="des_question" class="col-sm-2 control-label">Collabarators Needed[1 to 100]</label>
                <div class="col-sm-3">
                    <input type="number" id="option" name="tot_collabs" class="form-control" min='1' max='100' required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2"></div>
                <label for="des_question" class="col-sm-2 control-label">Post Category</label>
                <div class="col-sm-6">
                    <input type="text" id="option" name="post_cat" class="form-control" required>
                </div>

            </div>

            <center><button type="submit" class="btn btn-primary btn-block" name="sub_update">Publish Post</button></center>
        </form>
    </div>


</body>

<?php
include("config/configure.php");

if (isset($_POST['sub_update'])) {

    $header = htmlentities(mysqli_real_escape_string($con, $_POST['art_header']));
    $content = htmlentities(mysqli_real_escape_string($con, $_POST['art_content']));
    $tot_collabs = htmlentities(mysqli_real_escape_string($con, $_POST['tot_collabs']));
    $post_cat = htmlentities(mysqli_real_escape_string($con, $_POST['post_cat']));
    $cur_collabs = 0;
    $status = 0;

    $creator_email = $_SESSION['email'];
    $creator_select = "SELECT * from users where email='$creator_email'";
    $query = mysqli_query($con, $creator_select);
    $row = mysqli_fetch_array($query);
    $val = $row['user_id'];

    $insert_post = "INSERT INTO posts (header, content, host_id, total_collabs, cur_collabs, category, status)
                             VALUES ('$header','$content', '$val', '$tot_collabs', '$cur_collabs', '$post_cat', '$status')";
    $query = mysqli_query($con, $insert_post);
    if ($query) {
        echo "<script>alert('Post Added')</script>";
    } else {
        echo "<script>alert('Something wrong! try again')</script>";
        exit();
    }
}

?>