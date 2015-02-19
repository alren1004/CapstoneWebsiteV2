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

        <div id="introduction">
            <div style ="text-align: center">
                <iframe width="420" height="315" src="https://www.youtube.com/embed/9pU_jdGMZmk" frameborder="0" allowfullscreen></iframe>
            </div>

            <p>Hello! Welcome to our website, IT&Bison. The purpose of website is to connect with each other to share information
                such as mentorships, feedbacks and advices reguarding jobs, internships and classes for the major of
                students and alumni at Gallaudet University. I hope this website will be useful for you all and enjoy it.</p>
        </div>

    </div>

    <?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
</body>
</html>