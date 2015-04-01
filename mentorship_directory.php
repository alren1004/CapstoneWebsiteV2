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
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
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
        if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
            // Logged in.
        $get_role = mysql_query("SELECT * FROM profiles WHERE profile_id = " . $_SESSION['profile_id'] . "");


        if ($get_role) {
            $role = mysql_fetch_array($get_role)['role'];
            if(strcasecmp($role, "Mentor") == 0){
                include "mentorRegistrationForm.html";
            } else {
                echo "You are not a mentor.";
            }
        }

        } else {
            // Not logged in.
            echo "No registration";
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