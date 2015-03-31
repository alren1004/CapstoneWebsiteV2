<?php include "base.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="bower_components/jquery-ui/themes/smoothness/jquery-ui.min.css">
    <style>
        h4 {
            -moz-text-decoration-line: underline; /* Code for Firefox */
            text-decoration-line: underline;
        }
        article img { float:right; margin-right:50px;}
        article p { margin-right:50px;}
        article {height:350px; border:2px solid darkblue; padding-left:20px; margin-bottom: 4px}
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
        <article>
            <h2 id="the-team">The Team</h2>

            <h3 id="Timothy Yu">Timothy Yu (Technology Specialist)</h3>
            <img src="img/Timothy.jpg" alt="Timothy Yu" width="133.6" height="216">

            <p>
                <strong>Timothy Yu</strong> (@Timothy) is the information specialist of Gallaudet University. He is a senior student.
                He spent two months at Google working on products like Google. He graduated from Gallaudet University with a BS in Computer
                Science.</p>
            <br><br><br>
        </article>

        <article>

            <h3 id="Sung An">Sung An (Information Technology)</h3>
            <img src="img/Sung.jpg" alt="Sung" width="179" height="240">
            <p>
                <strong>Sung An</strong> (@Sungho) is the information technology of Gallaudet University. He is a senior student and comes from South Korea. He spent two years at Samsung working on products like Galaxy. He graduated from Gallaudet University with a BS in Computer Science.</p>
        </article>


        <article>

            <h3 id="Daniel Heidemeyer">Daniel Heidemeyer (Technology Technology)</h3>
            <img src="img/Daniel.jpg" alt="Daniel Heidemeyer" width="180" height="240">
            <p>
                <strong>Daniel Heidemeyer</strong> (@Heidemeyer) is the information technology of Gallaudet University. He is a senior student and comes from Germany. He spent four months at Congress working on products like database. He graduated from Gallaudet University with a BS in Computer Science.</p>
        </article>
    </div>

    <?php include "footer.html"; ?>
</div>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="js/dialogForm.js"></script>
</body>
</html>