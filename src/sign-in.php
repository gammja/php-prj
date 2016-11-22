<?php
$success = true;
if (isset($_POST['username'])) {
    include('connect.php');

    $userName = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT
                  u.id,
                  r.id AS role
                FROM `php-prj`.users u
                  JOIN `php-prj`.authorities a ON u.id = a.user_id
                  JOIN `php-prj`.roles r ON a.role_id = r.id
                WHERE u.username = '$userName' AND u.password = '$password'";

    $res = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($res)) {
        if ($row['role'] == 1) { // 1 - admin
            $url = "admin.php";
        } else {
            $userId = $row['id'];
            $url = "accounts.php?uid=$userId";
        }
        header("Location: $url");
    } else {
        $success = false;
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Application</title>
    <link rel="stylesheet" href="../web/css/bootstrap.min.css">
    <link rel="stylesheet" href="../web/css/application.css">
</head>
<body>
<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a href="#" class="brand">PHP Application</a>
        </div>
    </div>
</div>
<div class="container">
    <form class="form-login" method="post" action="sign-in.php">
        <h2 class="form-login-heading text-center">Sign In</h2>
        <?php if (!$success) { ?>
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                Your login attempt was not successful, try again. <strong>Reason:</strong> Bad credentials.
            </div>
        <?php } ?>
        <input name="username" type="text" class="input-block-level" placeholder="Username">
        <input name="password" type="password" class="input-block-level" placeholder="Password">
        <div class="row-fluid">
            <div class="span5">
                <label class="checkbox">
                    <input name="remember-me" type="checkbox" value="remember-me"> Keep me logged in
                </label>
                <div class="row-fluid">
                    <div class="span11 offset1">
                        <a id="forgot-password" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
            <div class="span6 offset1">
                <button class="btn btn-large btn-block btn-primary" type="submit">Sign In</button>
            </div>
        </div>
    </form>
</div>
<script src="../web/js/jquery-1.12.4.min.js"></script>
<script src="../web/js/bootstrap.min.js"></script>
</body>
</html>