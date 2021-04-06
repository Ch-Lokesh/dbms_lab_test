<!DOCTYPE html>
<html>
<?php session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collab Request</title>
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
function get_requests()
{
    global $con;
    $host_id = $_GET['user_id'];

    $get_requests = "SELECT * FROM requests
                     WHERE host_id = '$host_id' AND status = 0
                    ";
    $run_articles = mysqli_query($con, $get_requests);

    while ($row_posts = mysqli_fetch_array($run_articles)) {

        $req_id = $row_posts['req_id'];
        $content = $row_posts['des'];
        $req_user_id = $row_posts['req_user_id'];
        $post_id = $row_posts['post_id'];



        $select_creator = "SELECT * FROM users where user_id='$req_user_id'";
        $run_creator = mysqli_query($con, $select_creator);
        $row = mysqli_fetch_array($run_creator);
        $first_name = $row['first_name'];

        $select_post = "SELECT * FROM posts where post_id='$post_id'";
        $run_select_post = mysqli_query($con, $select_post);
        $row_post = mysqli_fetch_array($run_select_post);
        $header = $row_post['header'];
        $total_collabs = $row_post['total_collabs'];
        $cur_collabs = $row_post['cur_collabs'];
        $time = $row_post['time'];

        echo "
        <div class='container-fluid'>
            <div class='article'>
                 <div class = 'row'>
                    showing Collab request on <h2>$header</h2>
                 </div>
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
                    <div class='col-sm-2'><strong>Requested by</strong>  $first_name</div>
                    <div class='col-sm-1'></div>
                    <div class='col-sm-3'><strong>Collaborators need</strong>  $total_collabs</div>
                    <div class='col-sm-1'></div>
                    <div class='col-sm-3'><strong>Current Collaborators</strong>  $cur_collabs</div>
                    <div class='col-sm-3'><strong>Created at</strong>  $time </div>
                </div>
                <center><a href='single_request.php?req_id=$req_id'><button class='btn btn-info'>See More</button></a></center>
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
                    <h2><strong>Approved Posts</strong></h2>
                </center>

                <?php echo get_requests(5) ?>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
    </div>
</body>

</html>