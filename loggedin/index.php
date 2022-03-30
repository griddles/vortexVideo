<!DOCTYPE html>
<?php
    include "../reqs/db_connection.php";
    error_reporting(0);
    $username = $_POST['inputUser'];
    $password = $_POST['inputPass'];
    
    $conn = OpenCon();
    $sql = "SELECT username, email, pass FROM vortexaccounts";
    $result = $conn->query($sql);
    $logins = mysqli_fetch_all($result);

    $usersql = "SELECT username FROM vortexaccounts";
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
                break;
            }
        }
    }
    if ($usernamevalid != true)
    {
        echo "
        <html>
            <head>
                <meta name='viewport' content='width=device; initial=scale:1.0;'>
                <link rel='stylesheet' href='../reqs/globalStyle.css'>
                <link rel='icon' href='../images/vortexLogo.png'>
            <script src='../reqs/cookies.js'></script>
            </head>
            <title>Vortex - Log In</title>
            <body class='default'>
                <div class='sticky'>
                    <a class='inline' href='../home/' title='Vortex.com' style='margin-left:16px'><img src='../images/vortexFullLogo.png' width='240px'></a>
                    <form class='inline' method='post' action='index.php'>
                        <input class='searchbar' autocomplete='off' placeholder='Search' name='searchbar' id='searchbar'>
                    </form>
                    <a href='../login/'><button class='inline signin' id='signin'>Sign In</button></a>
                </div>s
                <div class='sidebar'>
                    <div class='navlink'><a href='../home/'>Home</a></div>
                    <div class='navlink'><a href='../about/'>About Us</a></div>
                </div>
                <div class='body'>
                    <h1>Invalid Login</h1>
                </div>
            </body>
        </html>
        ";
    }
    else
    {
?>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <script src="../reqs/cookies.js"></script>
        <meta http-equiv="refresh" content="2; url='../account/?account=<?php echo $username; ?>'" />
    </head>
    <title>Vortex - Log In</title>
    <body class="default" onload="setUser()">
        <div class="sticky">
            <a class="inline" href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="index.php">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <a href="../login/"><button class="inline signin" id="signin">Sign In</button></a>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="../home/">Home</a></div>
            <div class="navlink"><a href="../about/">About Us</a></div>
        </div>
        <div id="username" style="display:none;"><?php echo $username; ?></div>
        <div class="body">
            <h3>Successfully Signed In</h3>
            <h4>Redirecting...</h4>
        </div>
    </body>
</html>
<?php
    }
?>