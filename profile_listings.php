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
        <?php

        $get_profile_info = mysql_query("SELECT * FROM profiles");
        if ($get_profile_info) {
            echo
            "<h1 align='center'>Registered Users</h1>
                            <table class='allProfilesTable' align='center'>
                                <tr>
                                    <th>Profile ID</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Background</th>
                                    <th>Education</th>
                                    <th>Skills</th>
                                    <th>Role</th>
                                </tr>";
            // fetch each record in result set
            for ($counter = 0; $row = mysql_fetch_row($get_profile_info); ++$counter) {
                // build table to display results
                print("<tr>");

                $count = 1;
                foreach ($row as $key => $value) {
                    if ($count != 8) {
                        if ($count == 1) {
                            print("<td><a href='view_profile.php?user_id=$value'>$value</a></td>");
                        } else {
                            print("<td>$value</td>");
                        }
                    }
                    $count++;
                }


                print("</tr>");
            }
            echo "</table>";
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