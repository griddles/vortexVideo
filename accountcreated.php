<?php
    include "db_connection.php";
    $username = $_POST['inputUser'];
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPass'];
    create_account($username, $email, $password);
?>
<html>
<head>
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
        <meta http-equiv = "refresh" content = "3; url = account.php"/>
    </head>
    <title>Vortex - Account Created</title>
    <body class="default" onload="setUser()">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
            <a href="account.php"><button class="inline signin">Account</button><a>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div id="username" style="display:none;"><?php echo $username; ?></div>
        <div class="body">
            <h3>Account Created, Redirecting...</h3>
        </div>
    </body>
</html>