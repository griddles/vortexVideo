<!DOCTYPE html>
<?php
    include "../reqs/db_connection.php";
    error_reporting(0);
    $username = $_POST['loginUser'];
    $password = $_POST['loginPass'];
    

    console_log($username . $password);
    
    $conn = OpenCon();
    $sql = "SELECT username, email, pass FROM vortexaccounts"; // do all the grabbing of data from the database. this is super inefficient but does prevent SQL injection. 
    $result = $conn->query($sql); // probably should switch this for something else that is also secure but won't kill the databases.
    $logins = mysqli_fetch_all($result);

    $usersql = "SELECT username FROM vortexaccounts"; // get the username individually, so we can iterate through just the usernames later
    $userresult = $conn->query($usersql);
    $users = mysqli_fetch_all($userresult);

    $usernamevalid = false;

    foreach ($logins as $login)
    {
        if ($login[0] == $username)
        {
            if ($login[2] == $password)
            {
                $usernamevalid = true;
                setcookie("username", $username, 0, "/");
                break;
            }
        }
    }
    if ($usernamevalid != true) // error handling for invalid logins
    {
        ?>
        <html lang="en">
            <head>
                <meta name="viewport" content="width=device; initial=scale:1.0;">
                <link rel="stylesheet" href="../reqs/globalStyle.css">
                <link rel="icon" href="../images/vortexLogo.png">
            </head>
            <title>Vortex - Logged In</title>
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
                    <h1>Invalid Login</h1>
                </div>
            </body>
        </html>
        <?php
    }
    else
    {
?>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <meta http-equiv="refresh" content="2; url='../account/'" />
    </head>
    <title>Vortex - Logged In</title>
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
        <div id="username" style="display:none;"><?php echo $username; CloseCon($conn); ?></div>
        <div class="body">
            <h3>Successfully Signed In</h3>
            <h4>Redirecting...</h4>
        </div>
    </body>
</html>
<?php
    }
?>