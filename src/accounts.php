<?php
$userId = empty($_GET['username']) ? 2 : 3;
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
            <ul class="nav pull-left">
                <li><a href="accounts.php?username=<?php echo $_GET['username'] ?>">My Accounts</a></li>
                <li><a href="transactions.php?id=<?php echo $userId ?>">My Transactions</a></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown" data-toggle="dropdown">%UserName%[%Role%] <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="sign-in.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <h1>Accounts</h1>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Well done!</strong> New account has been successfully created.
    </div>
    <div>
        <a href="#create-new-account" class="btn btn-primary" data-toggle="modal">Create new account</a>
    </div>
    <br>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Account</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('connect.php');
        include('helpers.php');

        $query = "SELECT acc_num, description FROM `php-prj`.accounts WHERE user_id = $userId";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            $account = $row['acc_num'];
            $maskedAccount = mask($account);
            $description = $row['description'];
            echo "<tr>"
                . "<td><a href='transactions.php?id=$account'>$maskedAccount</a></td>"
                . "<td>$description</td>"
                . "</tr>";
        }

        mysqli_close($con);
        ?>
        </tbody>
    </table>
</div>
<div id="create-new-account" class="modal hide fade">
    <div class="modal-header">
        <button href="#" class="close" data-dismiss="modal">&times;</button>
        <h2 class="text-center">Create new account</h2>
    </div>
    <div class="modal-body">
        <form>
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Account Number is invalid.</strong> Please specify exactly 16 digits.
                All numerical, no spaces or dashes.
            </div>
            <input name="account" type="text" class="input-block-level" placeholder="Primary Account Number*">
            <textarea name="description" class="input-block-level" rows="6" placeholder="Description"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn btn-large btn-block btn-primary" type="submit">Create</button>
    </div>
</div>
<script src="../web/js/jquery-1.12.4.min.js"></script>
<script src="../web/js/bootstrap.min.js"></script>
</body>
</html>