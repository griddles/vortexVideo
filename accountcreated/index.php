<?php
    include "../reqs/db_connection.php";
    error_reporting(0);
    $username = $_POST['accUser']; // grab the data from the form on the previous page (login)
    $email = $_POST['accEmail'];
    $password = $_POST['accPass'];
    create_account($username, $email, $password); // run the db_connection function to create an account
    setcookie("username", $username, 0, "/"); // set the username cookie to keep the user logged in for this session (if we dont have the / at the end it totally breaks)
?>
<html>
    <head>
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <meta http-equiv = "refresh" content = "3; url = ../account/"/>
    </head>
    <title>Vortex - Account Created</title>
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
        <div id="username" style="display:none;"><?php echo $username; ?></div>
        <div class="body">
            <h3>Account Created, Redirecting...</h3>
        </div>
    </body>
</html>