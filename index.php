<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <?php
        include 'db_connection.php';
        error_reporting(0);
        if (isset($_GET['logout'])) 
        {
            setcookie("username", "");
            setcookie("pfp", "");
        }
    ?>
    <title>Vortex - Home</title>
    <body class="default" onload="getUser()">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="index.php">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
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
            $conn = OpenCon(); // connect to the database
            $sql = "SELECT title, creator, views, videopath, videokey, tags FROM vortexvideos"; // yoink the desired values
            $result = $conn->query($sql);
            $database = mysqli_fetch_all($result);
            $sorteddatabase = array();

            $searchtag = $_POST['searchbar'];
            $i = 0;
            if ($searchtag != null)
            {
                while ($i < count($database))
                {
                    $tags = explode("|", $database[$i][5]); //i know i could use str_contains here, but that'll 
                    $j = 0;                         //return true if the video has a tag of 'epicgamingmoment'  
                    while ($j < count($tags)) //and the user searches 'cgami'.
                    {
                        if ($searchtag == $tags[$j])
                        {
                            array_push($sorteddatabase, $database[$i]);
                            break;
                        }
                        $j += 1;
                    }
                    if (str_contains(strtolower($database[$i][0]), strtolower($searchtag)))
                    {
                        if (!in_array($database[$i], $sorteddatabase))
                        {
                            array_push($sorteddatabase, $database[$i]);
                        }
                    }
                    $i += 1;
                }
            }
            else
            {
                $sorteddatabase = $database;
            }

            $i = 0;
            while ($i < count($sorteddatabase)){ // dynamic thumbnails
                echo "
                <div class='inline thumbnail'>
                    <div class='thumbnailfade'>&nbsp</div>
                    <a href='video.php?v=" . $sorteddatabase[$i][4] . "'><img src='images/thumbnailPlaceholder.png' width='320' height='auto'></a>
                    <div>
                        <img class='creatoricon' src='images/maskmid.png' style='background-image:url(\"images/accountpfps/" . $sorteddatabase[$i][1] . ".png\")' width='32' height='32'>
                        <b>
                            <div class='inline thumbnailtitle' title='" . $sorteddatabase[$i][0] . "' style='width:280px; text-overflow:ellipsis; overflow:auto;'>"
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
    </body>
</html>
