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
                <li><a href="#create-new-user" data-toggle="modal">Add user</a></li>
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
    <h1>Users</h1>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('connect.php');
        include('helpers.php');

        $query = "SELECT
                      u.id AS userid,
                      u.username,
                      u.email,
                      u.first_name,
                      u.last_name,
                      r.name AS role
                  FROM users u
                      JOIN authorities a ON u.id = a.user_id
                      JOIN roles r ON a.role_id = r.id";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($res)) {
            $userId = $row['userid'];
            $userName = $row['username'];
            $email = $row['email'];
            $firstName = $row['first_name'];
            $lastName = $row['last_name'];
            $role = strtoupper($row['role']);

            echo "<tr>"
                . "<td><a href='accounts.php?uid=$userId'>$userName</a></td>"
                . "<td>$email</td>"
                . "<td>$firstName</td>"
                . "<td>$lastName</td>"
                . "<td>[$role]</td>"
                . "</tr>";
        }

        mysqli_close($con);
        ?>
        </tbody>
    </table>
</div>
<div id="create-new-user" class="modal hide fade">
    <div class="modal-header">
        <button href="#" class="close" data-dismiss="modal">&times;</button>
        <h2 class="text-center">Create new user</h2>
    </div>
    <div class="modal-body">
        <form>
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Some field is invalid.</strong> Details.
            </div>
            <label for="username">User name:</label>
            <input id="username" name="username" type="text" class="input-block-level" placeholder="User Name">
            <label for="first-name">First Name:</label>
            <input id="first-name" name="first-name" type="text" class="input-block-level" placeholder="First Name">
            <label for="last-name">Last Name:</label>
            <input id="last-name" name="last-name" type="text" class="input-block-level" placeholder="Last Name">
            <label for="email">Email:</label>
            <input id="email" name="email" type="email" class="input-block-level" placeholder="Email">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="input-block-level" rows="6"
                      placeholder="Description"></textarea>
            <label for="password">Password:</label>
            <input id="password" name="password" type="password" class="input-block-level" placeholder="Password">
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