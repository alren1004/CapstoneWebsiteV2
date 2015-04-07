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
        #submit, #reset {margin-left:12em; width:100px; height:3em;
        }

        #submit:hover {font-weight: bold; background-color: #bbbbbb;
        }

        #reset:hover {font-weight: bold; background-color: #bbbbbb;
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
    <?php

        if(!empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['comments'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $comments = $_POST['comments'];
            $headers = "From: " . $email . "\r\n" . "Cc: daniel.heidemeyer@gallaudet.edu, sung.an@gallaudet.edu\r\n";
            if(mail("timothy.yu@gallaudet.edu", $subject, $comments, $headers)){
                echo "<p>Email sent!</p>";
            } else {
                echo "<p>Email not sent.</p>";
            }
        } else {
            ?>

                <form action="contact_us.php" method="post" enctype="text/plain">
                    <fieldset>
                        <legend><h3>Contact Information</h3></legend>
                        <label for="name">Name:</label>
                        <input id="name" type="text" name="name" autofocus required><br>
                        <label for="email">Email:</label>
                        <input id="email" type="email" name="email" required><br>
                        <label for="subject">Subject:</label>
                        <input id="subject" type="subject" name="subject" required><br>
                        <label for="comments">Comment:</label>
                        <textarea id="comments" name="comments"
                                  placeholder="Please type here if you have any comment."></textarea><br>
                    </fieldset>

                    <fieldset>
                        <input type="submit" name="submit" id="submit" value="Submit">
                        <input type="reset" name="reset" id="reset" value="Reset"><br>
                    </fieldset>
                </form>
        <?php
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