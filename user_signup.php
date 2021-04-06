<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/index.css">
    <!-- <link rel="stylesheet" type="text/css" href="../styles/user_reg.css"> -->
</head>

<style>
    form {
        max-width: 1400px;
        margin: auto;
        border: 5px solid violet;
        padding-top: 10px;
        margin-top: 30px;
        border-radius: 30px;
        padding: 40px;
    }

    .btn {
        max-width: 120px;
        margin: auto;

    }
</style>

<body style="background-image: url('../images/MegaTron.jpg')">


    <div class="container-fluid reg-form">
        <form action="" method="post" enctype="multipart/form" role="form" class="form-horizontal">
            <center>
                <h2 style="margin-bottom:20px">Register as User</h2>
            </center>
            <hr>
            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="firstName" class="control-label">First Name</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="firstName" name="first_name" class="form-control" required>
                </div>


                <div class="col-sm-2">
                    <label for="firstName" class="control-label">Last Name</label>
                </div>
                <div class="col-sm-2">
                    <input type="text" id="firstName" name="last_name" class="form-control" required>
                </div>

            </div>


            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="firstName" class="control-label">Gmail</label>
                </div>
                <div class="col-sm-2">
                    <input type="email" id="firstName" name="user_email" class="form-control" required>
                </div>

                <div class="col-sm-2">
                    <label for="firstName" class="control-label">Confirm Gmail</label>
                </div>
                <div class="col-sm-2">
                    <input type="email" id="firstName" name="user_email1" class="form-control" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">
                    <label for="firstName" class="control-label">Password</label>
                </div>
                <div class="col-sm-2">
                    <input type="password" id="firstName" name="user_pass" class="form-control" required>
                </div>

                <div class="col-sm-2">
                    <label for="firstName" class="control-label">Confirm Password</label>
                </div>
                <div class="col-sm-2">
                    <input type="password" id="firstName" name="user_pass1" class="form-control" required>
                </div>

            </div>


            <button type="submit" class="btn btn-primary btn-block" name="user_sign_up">Register</button>
            <?php include("insert_new_user.php"); ?>
        </form>

        <center style="font-size:18px;">
            <p>Aleardy have an account <a href="user_login.php">Click Here</a></p>
        </center>
    </div>
</body>

</html>