<!DOCTYPE html>
<html>
<?php session_start();
include("config/configure.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <link rel="stylesheet" type="text/css" href="../styles/user_reg.css">
    <link rel="stylesheet" type="text/css" href="../styles/articles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<?php
function get_history()
{
    global $con;
    $user_id = $_GET['user_id'];
    $get_articles = "SELECT * FROM history
                     WHERE host_id='$user_id'";

    $run_articles = mysqli_query($con, $get_articles);

    while ($row_posts = mysqli_fetch_array($run_articles)) {

        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];


        $select_creator = "SELECT * FROM users where user_id='$user_id'";
        $run_creator = mysqli_query($con, $select_creator);
        $row = mysqli_fetch_array($run_creator);
        $first_name = $row['first_name'];

        echo "
        <div class='container-fluid'>
            <div class='article'>
                <div class='row'>
                    <div class='col-sm-6'>
                        <center><h2>User = $user_id</h2></center>
                    </div>
                    <div class='col-sm-6'>
                        <center><h2>Post = $post_id</h2></center>
                    </div>
                </div>
                 <hr id='hl' > 
            </div>
            </br>
        </div>
        </br>
        ";
    }
}

?>

<body>
    <?php include("user_header.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <center>
                    <h2><strong>History</strong></h2>
                </center>

                <?php echo get_history(5) ?>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
</body>

</html>