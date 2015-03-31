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
            clear: both;
        }

        label {
            float: left;
            width: 5em;
            text-align: right;
        }

        input, textarea {
            width: 400px;
            margin-left:0.8em;
            margin-bottom:0.8em;
        }

        textarea, input:required, input[required] input:invalid {
            border: 2px solid darkblue;
        }

        textarea {height:15em;}
        span>input {margin-left:12em;}

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
                <legend><h3>Contact Information</h3></legend>
                <label for="name">Name:</label>
                    <input type="text" name="name" required><br>
                <label for="email">Email:</label>
                    <input type="email" name="email" autofocus required><br>
                <label for="subject">Subject:</label>
                    <input type="subject" name="subject" required><br>
                <label for="comment">Comment:</label>
                    <textarea name="comments" placeholder="Please type here if you have any comment."></textarea><br>

                <fieldset>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset"><br>
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