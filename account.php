<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device, initial-scale=1.0">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - My Account</title>
    <body class="default" onload="getUser()">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
            <a href="login.php"><button class="inline signin" id="signin">Sign In</button></a>
            <a href="account.php"><button class="inline signin" id="account">Account</button><a>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <h1 id="accountname">
                [placeholder]
            </h1>
            <div>
                <?php
                include "db_connection.php";
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
                        <a href='video.php?" . $sorteddatabase[$i][4] . "'><img src='images/thumbnailPlaceholder.png' width='320' height='auto'></a>
                        <div>
                            <img class='creatoricon' src='images/vortexLogo.png' width='32' height='32'>
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
                <a href="index.php"><button class="button" onclick="signOut()">Sign Out</button></a>
            </div>
        </div>
    </body>
</html>