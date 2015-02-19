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
    include "logoutButton.html";
    include "header.html"; ?>

    <div class="container">
        <?php
        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = mysql_real_escape_string($_POST['username']);
            $password = md5(mysql_real_escape_string($_POST['password']));
            $email = mysql_real_escape_string($_POST['email']);

            $check_username = mysql_query("SELECT * FROM users WHERE user_name = '".$username."'");

            if(mysql_num_rows($check_username) == 1) {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, that username is taken. Please try again.</p>";
                include "registrationForm.html";
            } else {
                $register_query = mysql_query("INSERT INTO users (user_name, password, user_email, is_verified, is_alumni) VALUES('".$username."', '".$password."', '".$email."', false, true)");
                if($register_query) {
                    echo "<h1>Success</h1>";
                    echo "<p>Your account was successfully created. You may now login.</p>";
                } else {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, your registration failed. Please try again.</p>";
                    include "registrationForm.html";
                }
            }
        }
        else {
            include "registrationForm.html";
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