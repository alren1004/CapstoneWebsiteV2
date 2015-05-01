<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link type="text/css" rel="stylesheet" href="http://cdn.dcodes.net/2/columns/css/dc_columns.css"/>
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

        <div class="box">
            <video controls preload="metadata" width="900" height="480">
                <source src="video/Capstone.mp4" type="video/mp4;" codecs="avc1.42E01E, mp4a.40.2">
                <!-- for IE -->
            </video>

            <h2>Our mission</h2>

            <p>Hello! Welcome to our website, IT&amp;Bison. The purpose of website is to connect with each other to
                share information
                such as mentorships, feedbacks and advices reguarding jobs, internships and classes for the major of
                students and alumni at Gallaudet University. I hope this website will be useful for you all and
                enjoy it.</p>
        </div>
    </div>

    <?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
<script src="js/html5ext.js" type="text/javascript"></script>

</body>
</html>