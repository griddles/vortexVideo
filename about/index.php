<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <title>Vortex - About Us</title>
    <body class="default">
        <div class="sticky">
            <a href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="searchform" method="post" action="index.php">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <div class="accountbox">
                <div class="account">
                    <?php
                    error_reporting(0);
                    if ($_COOKIE["username"] == "")
                    { ?>
                    <a href="../login/"><button class="signin" id="signin">Sign In</button></a>
                    <?php 
                    }
                    else
                    { ?>
                    <a href="../account/"><button class="signin" id="account">Account</button><a>
                    <img class="pfp" id="pfp" src="../images/maskdark.png" style="background-image:url('../images/accountpfps/<?php echo $_COOKIE["username"]; ?>.png')" width="48px" height="48px">
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="../home/">Home</a></div>
            <div class="navlink"><a href="../about/">About Us</a></div>
        </div>
        <div class="body">
        <h1>Who we are</h1>
            <p class="bodytext">
                we are a website hi
            </p>
            <h1>What we do</h1>
            <p class="bodytext">
                we host videos for you to watch :)
            </p>
            <h1>Our Policies</h1>
            <p class="bodytext">
                do cool stuff and be a good buisness
            </p>
            <h1>Contact Us</h1>
            <p class="bodytext">
                this is all fake
                <ul class="bodytext">
                    <li>Phone: (830)-420-6969</li>
                    <li>Buisness Email: buisness@vortex.com</li>
                    <li>Customer Support Email: support@vortex.com</li>
                    <li>Mailing Address: 1234 N. Cool Person St., Denver, TX 54321</li>
                </ul>
            </p>
        </div>
    </body>
</html>
