<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - About Us</title>
    <body class="default" onload="getUser()">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
            <a href="login.php"><button class="inline signin" id="signin">Sign In</button></a>
            <a href="account.php"><button class="inline signin" id="account">Account</button><a>
            <img class="inline pfp" id="pfp" src="images/maskdark.png" style="background-image:url('<?php echo $_COOKIE["pfp"]; ?>')" width="48px" height="48px">
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
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
