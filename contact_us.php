<?php include "base.php"; ?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="dcodes/maps/css/dc_maps.css" />
    <link type="text/css" rel="stylesheet" href="dcodes/columns/css/dc_columns.css" />
    <link type="text/css" rel="stylesheet" href="dcodes/contact_forms/css/dc_form_contact_dark.css" />
    <link type="text/css" rel="stylesheet" href="dcodes/contact_forms/css/dc_form_contact_light.css" />
    <link type="text/css" rel="stylesheet" href="dcodes/divider/css/dc_divider.css" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Neuton">
    <link rel="stylesheet" type="text/css" href="dcodes/social_icons/dc_social_icons.css" />

    <style>


        label {
            float: left;
            width: 100px;
            text-align: left;

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

            <!--<form action="contact_us.php" method="post" enctype="text/plain">
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
            </form> -->
            <!-- DC Contact Form Start -->
            <!-- DC [Columns: L/Sidebar + Body] Start -->
            <div align="center" ><h2>Contact</h2></div>
            <div class="dc_hrline_black" style="width:99%; "></div>
            <div class="one_third_pad">
                 <form action="" class="dc_form_contact_light">
                        <label for="name">Name <span>(required)</span></label>
                        <input type="text" name="name" class="form-input" required />
                        <label for="email">Email <span>(required)</span></label>
                        <input type="email" name="email" class="form-input" required />
                        <label for="subject">Subject <span>(optional)</span></label>
                        <input type="text" name="subject" class="form-input" />
                        <label for="message">Message <span>(required)</span></label>
                        <textarea name="message" class="form-input" required></textarea>
                        <input class="form-btn" type="submit" value="Send Message" />
                      </form>
            </div>


            <div class="two_third_pad column-last">
                  <h2>Address</h2>
                    <p> Gallaudet University, HMB W353</br>
                        800 Florida Ave NE</br>
                        Washington, DC 20002</p>
                  <div id="googleMap" style="width:550px;height:410px;"></div>
            </div>
            <!-- END two_third_pad -->
            <!-- DC [Columns: L/Sidebar + Body] End -->
            <div class="dc_clear"></div> <!-- line break/clear line -->
             
                  

        <?php
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
<script type="text/javascript" src="dcodes/contact_forms/js/dc_form_contact.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
    function initialize() {
        var mapProp = {
            center:new google.maps.LatLng(38.9073649,-76.99373249999996),
            zoom:5,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>



</body>
</html>