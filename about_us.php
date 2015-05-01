<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="dcodes/social_icons/dc_social_icons.css"/>

    <style>
        h4 {
            -moz-text-decoration-line: underline; /* Code for Firefox */
            text-decoration-line: underline;
        }

        article img {
            float: right;
            margin-right: 50px;
        }

        article p {
            margin-right: 50px;
        }

        article {
            height: 350px;
            border: 2px solid darkblue;
            padding-left: 20px;
            margin-bottom: 4px
        }
    </style>
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
        <article>
            <h2 id="the-team">The Team</h2>

            <img src="img/Timothy.jpg" alt="Timothy Yu" width="133.6" height="216">

            <h3 id="Timothy Yu">Timothy Yu (Technology Specialist)</h3>

            <p>
                <strong>Timothy Yu</strong> is a Honors IT and Mathematics Major at Gallaudet University. Timothy has worked
                in three internships for Ventana Medical Systems, University of Washington, and Gallaudet University. Timothy
                has strong skills in computer science and mathematics, and is very knowledgeable in his field. Timothy is
                currently focusing on Android application development, as the mobile technology field is a hot and very
                interesting topic.
            </p>

            <br><br><br>
        </article>

        <article>

            <h3 id="Sung An">Sung An (Information Technology)</h3>

            <img src="img/Sung.jpg" alt="Sung" width="179" height="240">

            <p>
                <strong>Sung An</strong> is the information technology of Gallaudet University.
                Sung An is passionate about computer science. That passion drove him to graduate at the top of his class
                at the Samsung University in his home country of South Korea.
                In two short years Sung has wielded his software development skills for technology companies in
                Washington DC, back to South Korea, and finally in Washington DC.
                For the past year Sung has been focusing that passion on his projects as a software developer for
                Microsoft’s Windows team working on the kernel of cloud computing called the fabric.
            </p>
        </article>


        <article>

            <h3 id="Daniel Heidemeyer">Daniel Heidemeyer (Information Technology)</h3>

            <img src="img/Daniel.jpg" alt="Daniel Heidemeyer" width="180" height="240">

            <p>
                <strong>Daniel Heidemeyer</strong> is the information technology of Gallaudet University. He comes from
                Germany. He spent four months at Congress working on products like database
                Daniel Heidemeyer’ positive undergraduate experience at Gallaudet University only left him wanting more.
                “I double majored in computer science and computer systems and just didn’t have time to take all the
                courses I would have liked.”
            </p>
        </article>
    </div>

    <?php include "footer.html"; ?>
    <div class="copyRight">
        <p>&copy;Copyright 2015, IT&Bison&nbsp;<a class="facebook_square32 dc_social_square32" title="facebook"
                                                  href="https://www.facebook.com/itBison">facebook</a>
            <a class="twitter2_square32 dc_social_square32" title="twitter" href="#">twitter</a><a
                class="instagram_square32 dc_social_square32" title="instagram" href="#">instagram</a></p>
    </div>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
</body>
</html>