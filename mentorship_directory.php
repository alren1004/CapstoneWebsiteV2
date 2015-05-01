<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    <link rel="stylesheet" type="text/css" href="css/mentorships.css">
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
        if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
            // Logged in.
            $get_role = mysql_query("SELECT * FROM profiles WHERE profile_id = " . $_SESSION['profile_id'] . "");

            if ($get_role) {
                $role = mysql_fetch_array($get_role)['role'];
                if (strcasecmp($role, "Mentor") == 0) {
                    include "mentorRegistrationForm.html";
                }
            }

            $get_mentorships = mysql_query("SELECT * FROM mentors");
            if ($get_mentorships) {
                echo
                "<h1 align='center'>Available Mentorships</h1>
                            <table class='mentorshipTable' align='center'>
                                <tr>
                                    <th>Mentorship ID</th>
                                    <th>Mentor ID</th>
                                    <th>Description</th>
                                    <th>Years of Experience</th>
                                    <th>Field</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>";
                // fetch each record in result set
                for ($counter = 0; $row = mysql_fetch_row($get_mentorships); ++$counter) {
                    // build table to display results
                    print("<tr>");

                    $count = 0;
                    foreach ($row as $key => $value) {
                        if ($count == 1) {
                            print("<td><a href='view_profile.php?user_id=$value'>$value</a></td>");
                        } else {
                            print("<td>$value</td>");
                        }
                        $count++;
                    }
                    print("</tr>");
                }
                echo "</table>";
            } else {
                echo "You are not a mentor.";
            }

        } else {
            // Not logged in.

            echo "<centre><h3>Member Login</h3></centre>
                    <form action='landing_page.php' name='loginForm' id='loginForm' method='POST'>
                    <table border='0' cellspacing='0' cellpadding='4'  style='padding:0px; border:1px  #ccc; '>
                        <tr>
                            <td><label for='username'>Username:</label></td>
                            <td ><input name='username' type='text' id='username' required='true' size='25' /></td>
                        </tr>
                        <tr>
                            <td><label for='password'>Password:</label></td>
                            <td><input name='password' type='password' id='password' required='true' size='25' /></td>
                        </tr>
                        <tr>
                        <tr>
                          <td><label>Submit Button:</label></td>
                          <td><input type='submit' value='Sign in' /></td>
                        </tr>
                    </table>
                    </form>";
            echo "<li><P>Please fill out on the page of registration if you have not registered. <a href=registration.php> Click here.</a></P></li>";
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