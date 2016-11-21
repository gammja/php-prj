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
    <form class="form-login" method="get" action="accounts.php">
        <h2 class="form-login-heading text-center">Sign In</h2>
        <div class="alert alert-error">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            Your login attempt was not successful, try again.
            <strong>Reason:</strong> Bad credentials.
        </div>
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