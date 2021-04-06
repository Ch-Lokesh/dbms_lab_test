<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <link rel="stylesheet" type="text/css" href="../styles/user_reg.css">
</head>


<body style="background-image: url('../images/MegaTron.jpg')">


    <div class="container-fluid reg-form">
        <form action="" method="post" enctype="multipart/form" role="form" class="form-horizontal">
            <h2>Login as User</h2>

            <div class="form-group row">
                <label for="firstName" class="col-sm-4 control-label">Gmail</label>
                <div class="col-sm-8">
                    <input type="email" id="firstName" name="user_email" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="firstName" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" id="firstName" name="user_pass" class="form-control" required>
                </div>
            </div>

            <center><button type="submit" class="btn btn-primary btn-block" name="user_sign_in">Login</button></center>
            <?php include("check_user_login.php"); ?>
        </form>
        <p><a href="registration.php">Click Here </a> to create account</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>