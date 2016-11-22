<?php session_start();?>
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
                <li><a href="accounts.php?uid=<?php echo $_SESSION['userId'] ?>">My Accounts</a></li>
                <li><a href="transactions.php?uid=<?php echo $_SESSION['userId'] ?>">My Transactions</a></li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" class="dropdown" data-toggle="dropdown">
                        <?php echo $_SESSION['userName'] . ' [' . strtoupper($_SESSION['roleName']) . ']'; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Change password</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php">Logout</a></li>
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
        <?php
        date_default_timezone_set('UTC');

        include('connect.php');
        include('helpers.php');

        if(isset($_GET['id'])){
            $query = "SELECT
                        from_acc,
                        to_acc,
                        payment_time,
                        amount,
                        description,
                        status
                      FROM `php-prj`.payments
                      WHERE from_acc = " . $_GET['id'];
            fetch($con, $query);
        } elseif (isset($_GET['uid'])){
            $query = "SELECT
                        p.from_acc,
                        p.to_acc,
                        p.payment_time,
                        p.amount,
                        p.description,
                        p.status
                      FROM accounts a
                        JOIN payments p ON a.acc_num = p.from_acc
                      WHERE a.user_id = " . $_GET['uid'];
            fetch($con, $query);
        }

        function fetch($con, $query){
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($res)) {
                $account = $row['to_acc'];
                $maskedAccount = mask($account);
                $description = $row['description'];
                $amount = $row['amount'];
                $destination = mask($row['to_acc']);
                $date = date('d.m.Y', strtotime($row['payment_time']));
                $status = $row['status'] == 1 ? "Done" : "In progress";
                echo "<tr>"
                    . "<td><a href='accounts.php?acc='$account'>$maskedAccount</a></td>"
                    . "<td>$description</td>"
                    . "<td>$amount</td>"
                    . "<td>$destination</td>"
                    . "<td>$date</td>"
                    . "<td>$status</td>"
                    . "</tr>";
            }
        }

        mysqli_close($con);
        ?>
        </tbody>
    </table>
</div>
<script src="../web/js/jquery-1.12.4.min.js"></script>
<script src="../web/js/bootstrap.min.js"></script>
</body>
</html>