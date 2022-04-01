<!DOCTYPE html>
<?php
    error_reporting(0);
?>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <script src="../reqs/cookies.js"></script>
    </head>
    <title>Vortex - Account</title>
    <body class="default" onload="getUser()">
        <div class="sticky">
        <a class="inline" href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="../home/">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <a href="../account/"><button class="inline signin" id="account">Account</button><a>
            <img class="inline pfp" id="pfp" src="../images/maskdark.png" style="background-image:url('<?php echo $_COOKIE["pfp"]; ?>')" width="48px" height="48px">
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="../home/">Home</a></div>
            <div class="navlink"><a href="../about/">About Us</a></div>
        </div>
        <div class="body">
            <a href="../uploadpfp/">
                <img class="accountpfp" src=../images/masklight.png style="background-image:url('<?php echo $_COOKIE["pfp"]; ?>')" width="64px" height="64px">
            </a>
            <h1 id="accountname" class="inline username">
                [placeholder]
            </h1>
            <form method="post" action="../deleteaccount.php">
                <input class="signinfield" autocomplete="off" placeholder="Username" name="inputUser" id="inputUser">
                <br>
                <input class="signinfield" autocomplete="off" type="password" placeholder="Password" name="inputPass" id="inputPass">
                <br>
                <input class="button" type="submit" value="Delete Account (broken)">
            </form>
        </div>
    </body>
</html>