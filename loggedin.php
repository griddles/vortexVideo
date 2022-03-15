<?php
    include "db_connection.php";
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
                <link rel='stylesheet' href='globalStyle.css'>
                <link rel='icon' href='images/vortexLogo.png'>
            <script src='cookies.js'></script>
            </head>
            <title>Vortex - Home</title>
            <body class='default' onload='getUser()'>
                <div class='sticky'>
                    <a class='inline' href='index.php' title='Vortex.com' style='margin-left:16px'><img src='images/vortexFullLogo.png' width='240px'></a>
                    <form class='inline'>
                        <input class='searchbar' placeholder='Search'>
                    </form>
                    <a href='login.php'><button class='inline signin' id='signin'>Sign In</button></a>
                    <a href='account.php'><button class='inline signin' id='account'>Account</button><a>
                </div>
                <div class='sidebar'>
                    <div class='navlink'><a href='index.php'>Home</a></div>
                    <div class='navlink'><a href='about.php'>About Us</a></div>
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
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
        <meta http-equiv = "refresh" content = "3; url = account.php?username=<?php echo $username; ?>"/>
    </head>
    <title>Vortex - Logged In</title>
    <body class="default" onload="setUser()">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
            <a href="account.php"><button class="inline signin" id="account">Account</button><a>
            <img class="inline pfp" id="pfp" src="<?php echo $_COOKIE["pfp"]; ?>" width="48px" height="48px">
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div id="username" style="display:none;"><?php echo $username; ?></div>
        <div class="body">
            <h3>Successfully Signed In</h3>
            <h5>Redirecting...</h5>
        </div>
    </body>
</html>
<?php
    }
?>