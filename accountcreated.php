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
    </head>
    <title>Vortex - Account Created</title>
    <body class="default">
        <div class="sticky">
        <a href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <h3>Account Created :)</h3>
        </div>
    </body>
</html>