<?php
    include "db_connection.php";
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
        console_log($username);
        console_log($login[0]);
        console_log($password);
        console_log($login[2]);
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
            <body>
                <h2>
                    Invalid Login.
                </h2>
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
    </head>
    <title>Vortex - Home</title>
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
            <h3>Signed In</h3>
            <a href="account.php"><button>Continue to your account</button></a>
        </div>
    </body>
</html>
<?php
    }
?>