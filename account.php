<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <?php
        include "db_connection.php";
        error_reporting(0);
    ?>
    <title>Vortex - My Account</title>
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
            <?php 
                $username = $_GET["username"];
                if ($username != "")
                {
                    setcookie("pfp", "images/accountpfps/" . $username . ".png");
                    header("Refresh:0 url=account.php");
                }
            ?>
            <img class="accountpfp" src=images/masklight.png style="background-image:url('<?php echo $_COOKIE["pfp"]; ?>')" width="64px" height="64px">
            <h1 id="accountname" class="inline username">
                [placeholder]
            </h1>
            <a href="accountsettings.php"><button class="settings button">Settings</button></a>
            <div>
                <?php
                    $conn = OpenCon();
                    $sql = "SELECT title, creator, views, videopath, videokey FROM vortexvideos"; // yoink the desired values from the database
                    $result = $conn->query($sql);
                    $database = mysqli_fetch_all($result);
                    
                    $sorteddatabase = array();
                    $i = 0;
                    while ($i < count($database))
                    {
                        if ($database[$i][1] == $_COOKIE["username"])
                        {
                            array_push($sorteddatabase, $database[$i]);
                        }
                        $i += 1;
                    }
                    
                    $i = 0;
                    while ($i < count($sorteddatabase))
                    {
                        echo "
                        <div class='inline thumbnail'>
                            <div class='thumbnailfade'></div>
                            <a href='video.php?v=" . $sorteddatabase[$i][4] . "'><img src='images/thumbnailPlaceholder.png' width='320' height='auto'></a>
                            <div>
                            <img class='creatoricon' src='images/maskmid.png' style='background-image:url(\"images/accountpfps/" . $database[$i][1] . ".png\")' width='32' height='32'>
                                <b>
                                    <div class='inline thumbnailtitle' title='" . $sorteddatabase[$i][0] . "' style='width:300px; text-overflow:ellipsis; overflow:auto;'>"
                                    . $sorteddatabase[$i][0] .
                                    "</div>
                                </b>
                            </div>
                        </div>
                        ";
                        $i += 1;
                    }
                ?>
            </div>
            <div>
                <a href="index.php?logout=true"><button class="button" onclick="signOut()">Sign Out</button></a>
            </div>
            <br>
            <br>
        </div>
    </body>
</html>