<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    <link rel="stylesheet" type="text/css" href="css/profile.css"/>

    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="dcodes/social_icons/dc_social_icons.css"/>
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
        if (!empty($_GET['user_id'])) {
            // Provided profile id.
            // view_profile.php?user_id=001
            $user_id = $_GET['user_id'];

            $get_user_info = mysql_query("SELECT * FROM users WHERE user_id = '" . $user_id . "'");

            if (mysql_num_rows($get_user_info) <= 1) {
                $user_row = mysql_fetch_array($get_user_info);
                $user_name = $user_row['user_name'];
                $user_email = $user_row['user_email'];

                $get_profile_info = mysql_query("SELECT * FROM profiles WHERE user_id =" . $user_id . "");
                $profile_row = mysql_fetch_array($get_profile_info);

                $profile_id = $profile_row['profile_id'];
                $first_name = $profile_row['first_name'];
                $last_name = $profile_row['last_name'];
                $background = $profile_row['background'];
                $education = $profile_row['education'];
                $skills = $profile_row['skills'];
                $role = $profile_row['role'];

                include "profileDisplay.php";
                include "profileForm.php";
                echo "<input style='visibility: hidden' type='submit' id='edit' name='edit' value='Edit' />";
            } else {
                echo "<p>The user you are searching for does not exist.</p>";
            }
        } else {
            echo "<p>The user you are searching for does not exist.</p>";
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