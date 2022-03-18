<!DOCTYPE html>
<?php
    error_reporting(0);
?>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - Home</title>
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
            <a href="uploadpfp.php">
                <img class="accountpfp" src=images/masklight.png style="background-image:url('<?php echo $_COOKIE["pfp"]; ?>')" width="64px" height="64px">
            </a>
            <h1 id="accountname" class="inline username">
                [placeholder]
            </h1>
            <form method="post" action="deleteaccount.php">
                <input class="signinfield" autocomplete="off" placeholder="Username" name="inputUser" id="inputUser">
                <br>
                <input class="signinfield" autocomplete="off" type="password" placeholder="Password" name="inputPass" id="inputPass">
                <br>
                <input class="button" type="submit" value="Delete Account">
            </form>
        </div>
    </body>
</html>