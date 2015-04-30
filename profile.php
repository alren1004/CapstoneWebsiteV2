<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/form.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="dcodes/social_icons/dc_social_icons.css" />
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
        if (!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])) {
            // Logged in.

            $get_user_info = mysql_query("SELECT * FROM users WHERE user_name = '" . $_SESSION['Username'] . "'");
            $user_row = mysql_fetch_array($get_user_info);
            $user_id = $user_row['user_id'];
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

            if (!empty($_POST['background']) && !empty($_POST['education']) && !empty($_POST['skills']) && !empty($_POST['role'])) {
                $background = $_POST['background'];
                $education = $_POST['education'];
                $skills = $_POST['skills'];
                $role = $_POST['role'];
                $save_profile = mysql_query("UPDATE profiles SET background='" . $background . "', education='" . $education . "', skills='" . $skills . "', role='" . $role . "' WHERE profile_id =" . $profile_id . "");
                if($save_profile){
                    echo "<p id='status' style='background-color: green;'>Data saved successfully.</p>";
                } else {
                    echo "<p id='status' style='background-color: red;>Error saving data.</p>";
                }
                unset($_POST['background']);
                unset($_POST['education']);
                unset($_POST['skills']);
                unset($_POST['role']);
            }
            include "profileDisplay.php";
            include "profileForm.php";
            echo "<input type='submit' id='edit' name='edit' value='Edit' />";
        } else {

            echo"<centre><h3>Member Login</h3></centre>
                    <form action='landing_page.php' name='loginForm' id='loginForm' method='POST'>
                    <table border='0' cellspacing='0' cellpadding='4'  style='padding:0px; border:1px  #ccc; '>
                        <tr>
                            <td><label for='username'>Username:</label></td>
                            <td><input name='username' type='text' id='username' required='true' size='25' /></td>
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
    <div class="copyRight">
        <p>&copy;Copyright 2015, IT&Bison&nbsp;<a class="facebook_square32 dc_social_square32" title="facebook" href="https://www.facebook.com/itBison">facebook</a>
            <a class="twitter2_square32 dc_social_square32" title="twitter" href="#">twitter</a><a class="instagram_square32 dc_social_square32" title="instagram" href="#">instagram</a></p>
    </div>

</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#edit").click(function () {
            $("#profile-display").toggle();
            $("#profile-edit-form").toggle();
            $(this).toggle();
            $("#status").hide();
            /*
             var value = $(this).attr("value");
             if (value === "Edit"){
             $(this).prop("value", "Save");
             } else {
             $(this).prop("value", "Edit");
             }
             */
        })
    })
</script>
</body>
</html>