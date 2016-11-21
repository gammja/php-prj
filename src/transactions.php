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
                <li><a href="accounts.php">My Accounts</a></li>
                <li><a href="transactions.php">My Transactions</a></li>
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
    <h1>Transactions</h1>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Account</th>
            <th>Payment description</th>
            <th>Amount</th>
            <th>Destination</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="#">12345*******3456</a></td>
            <td>Food</td>
            <td>100</td>
            <td>23115*******6753</td>
            <td>11.11.2016</td>
            <td>Done</td>
        </tr>
        <tr>
            <td><a href="#">55245*******6754</a></td>
            <td>Phone</td>
            <td>10000</td>
            <td>44223*******5732</td>
            <td>12.11.2016</td>
            <td>In progress</td>
        </tr>
        </tbody>
    </table>
</div>
<script src="../web/js/jquery-1.12.4.min.js"></script>
<script src="../web/js/bootstrap.min.js"></script>
</body>
</html>