<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
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
        if (!empty($_POST['MentorshipDesc'])) {

            $profile_id = $_SESSION['profile_id'];
            $mentorship_desc = mysql_real_escape_string($_POST['MentorshipDesc']);
            $yearOfExperience = mysql_real_escape_string($_POST['Year_Of_Experience']);
            $fieldsSelect = mysql_real_escape_string($_POST['fieldsSelect']);
            $startDate = mysql_real_escape_string($_POST['startDate']);
            $endDate = mysql_real_escape_string($_POST['endDate']);

            $mentors_insert_query = mysql_query(
                "INSERT INTO mentors (mentorship_desc, years_of_experiences, fieldsSelect, startDate, endDate, profile_id) VALUES('"
                . $mentorship_desc . "', '" . $yearOfExperience . "', '" . $fieldsSelect . "', '" . date('Y-m-d', strtotime(str_replace('-', '/', $startDate))) . "', '" . date('Y-m-d', strtotime(str_replace('-', '/', $endDate))) . "', '"
                . $profile_id . "')"
            );

            if ($mentors_insert_query) {
                echo "<h1>Success</h1>";
                echo "<p>Your mentorship was successfully saved. Thank you for becoming a mentor! <a href='mentorship_directory.php'>Click here to go back to mentorship directory.</a></p>";
            } else {
                echo "<h1>Error inserting into mentor registration</h1>";
                echo "<p>Sorry, your registration failed. Please try again.</p>";
            }

        } else {

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