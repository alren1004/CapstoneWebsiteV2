<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
</head>
<body>

<div class="wrapper">

    <?php
    if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
        // Logged in.
        include "logoutButton.html";
    } else {
        // Not logged in.
        include "loginForm.html";
    }
    include "header.html";
    ?>

    <div class="container">
        <?php
        if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
            // Logged in.
            echo "<h1>You are logged in.</h1>";
            echo "<p><a href='mentorship_directory.php'>Go to mentorship directory.</a></p>";
            echo "<p><a href='profile.php'>Go to your profile page.</a></p>";
        } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {
            // Logging in...
            $username = mysql_real_escape_string($_POST['username']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            $check_login = mysql_query("SELECT * FROM users WHERE user_name = '" . $username . "' AND password = '" . $password . "'");
            if (mysql_num_rows($check_login) == 1) {
                $row = mysql_fetch_array($check_login);
                $user_id = $row['user_id'];

                $get_profile_id = mysql_query("SELECT profile_id FROM profiles WHERE user_id = '" . $user_id . "''");
                $profile_row = mysql_fetch_array($get_profile_id);

                $_SESSION['Username'] = $username;
                $_SESSION['profile_id'] = $profile_row['profile_id'];
                $_SESSION['LoggedIn'] = 1;

                echo "<h1>Successful login!</h1>";
                echo "<p>Redirecting...</p>";
                echo "<meta http-equiv='refresh' content='2;landing_page.php'>";
            } else {
                echo "<h1>Error</h1>";
                echo "<p>Account not found. Please try again</a>.</p>";
            }
        } else {
            // Not logged in.
            echo "<h1>Error. This should not happen.</h1>";
        }
        ?>
    </div>

    <?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
</body>
</html>