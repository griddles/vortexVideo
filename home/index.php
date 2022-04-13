<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <?php
        include '../reqs/db_connection.php';
        error_reporting(0);
        if (isset($_COOKIE['username']) && $_GET["logout"] == "true") 
        {
            unset($_COOKIE['username']); 
            setcookie('username', null, -1, '/'); 
        }
    ?>
    <title>Vortex - Home</title>
    <body class="default">
        <div class="sticky">
            <a class="inline" href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="../home/">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <?php
            if ($_COOKIE["username"] == "")
            { ?>
            <a href="../login/"><button class="inline signin" id="signin">Sign In</button></a>
            <?php 
            }
            else
            { ?>
            <a href="../account/"><button class="inline signin" id="account">Account</button><a>
            <img class="inline pfp" id="pfp" src="../images/maskdark.png" style="background-image:url('../images/accountpfps/<?php echo $_COOKIE["username"]; ?>.png')" width="48px" height="48px">
            <?php
            }
            ?>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="../home/">Home</a></div>
            <div class="navlink"><a href="../about/">About Us</a></div>
        </div>
        <div class="body">
            <?php
            $conn = OpenCon(); // connect to the database
            $sql = "SELECT title, creator, views, description, videokey, tags FROM vortexvideos"; // yoink the desired values
            $result = $conn->query($sql);
            $database = mysqli_fetch_all($result);
            $sorteddatabase = array();

            $searchtag = $_POST['searchbar'];
            $i = 0;
            if ($searchtag != null)
            {
                echo "<h4>Searching for " . $searchtag . ":</h4>";
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
                ?>
                <div class="inline thumbnail">
                    <div class="thumbnailfade"></div>
                    <a href="../video/?v=<?php echo $sorteddatabase[$i][4]; ?>"><img src="../videos/thumbnails/<?php echo $sorteddatabase[$i][4]; ?>.png" style="background-image:url(\'../images/thumbnailPlaceholder.png\');" width="320" height="180"></a>
                    <div>
                        <img class="creatoricon" src="../images/maskmid.png" style="background-image:url('../images/accountpfps/<?php echo $sorteddatabase[$i][1]; ?>.png\')" width="32" height="32">
                        <b>
                            <div class="inline thumbnailtitle" title="<?php echo $sorteddatabase[$i][0]; ?>" style="width:280px; text-overflow:ellipsis; overflow:auto;">
                                <?php echo $sorteddatabase[$i][0]; ?>
                            </div>
                        </b>
                    </div>
                </div>
                <?php
                $i += 1;
            }
            CloseCon($conn);
            ?>
        </div>
    </body>
</html>
