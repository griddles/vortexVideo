<?php
    include "../reqs/db_connection.php";
    $username = $_POST['inputUser'];
    $password = $_POST['inputPass'];
    
    $conn = OpenCon();
    $sql = "SELECT username, pass FROM vortexaccounts";
    $result = $conn->query($sql);
    $logins = mysqli_fetch_all($result);

    $usernamevalid = false;

    foreach ($logins as $login)
    {
        if ($login[0] == $username)
        {
            if ($login[1] == $password)
            {
                console_log("correct credentials");
                $usernamevalid = true;
                break;
            }
        }
    }
    if ($usernamevalid != true)
    {
        echo "
        <!DOCTYPE html>
        <html>
            <head>
                <meta name='viewport' content='width=device; initial=scale:1.0;'>
                <link rel='stylesheet' href='../reqs/globalStyle.css'>
                <link rel='icon' href='../images/vortexLogo.png'>
                <script src='../reqs/cookies.js'></script>
            </head>
            <title>Vortex - Home</title>
            <body class='default'>
                <div class='sticky'>
                    <a class='inline' href='../home/' title='Vortex.com' style='margin-left:16px'><img src='../images/vortexFullLogo.png' width='240px'></a>
                    <form class='inline'>
                        <input class='searchbar' placeholder='Search'>
                    </form>
                    <a href='login.php'><button class='inline signin' id='signin'>Sign In</button></a>
                    <a href='account.php'><button class='inline signin' id='account'>Account</button><a>
                </div>
                <div class='sidebar'>
                    <div class='navlink'><a href='../home/'>Home</a></div>
                    <div class='navlink'><a href='../about/'>About Us</a></div>
                </div>
                <div class='body'>
                    <h1>Invalid Credentials</h1>
                </div>
            </body>
        </html>
        ";
    }
    else
    {
        $deletesql = "DELETE FROM `vortexaccounts` WHERE `vortexaccounts`.`username` = '$username'";
        console_log("starting deletion process for " . $username);
        console_log($deletesql);
        if($conn->query($deletesql) === TRUE)
        {  
            echo "Record deleted successfully";  
        }
        else
        {
            echo "Could not deleted record: ". mysqli_error($conn);  
        } 
        console_log("deleted.");
        header('Location: deleted.php');
    }
?>