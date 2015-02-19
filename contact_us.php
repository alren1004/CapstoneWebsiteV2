<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <style>
        textarea {
            height: 10em;
            width: 25em;
            clear: both;
            margin-left: 50px;
            margin-top: 13px;


        }
        comment {

            text-align: right;
        }
    </style>
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
        <form>
            <fieldset>
                    <legend> Contact Information</legend>

                <label for="from">From:</label>
                <input type="text" name="from" id="from"  required="true"
                       class="text ui-widget-content ui-corner-all"><br>


                <label for="subject">Subject:</label>
                <input type="text" name="subject" id="subject"  required="true"
                       class="text ui-widget-content ui-corner-all"><br>

                <label for="Comment">Comment:</label>
                <textarea rows="4" cols="50" name="Comment" placeholder="Please type here if you have any comment." ></textarea>

            <input type="submit" value="Submit" tabindex="-1" style="position:absolute; top:-1000px">

            </fieldset>
        </form>


    </div>

    <?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
</body>
</html>