<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <?php
        include '../reqs/db_connection.php';
        error_reporting(0);
        if (isset($_COOKIE['username']) && $_GET["logout"] == "true") // properly sign the user out (probably not the most secure way to do this but its just logging the user out what can go wrong)
        {
            unset($_COOKIE['username']);
            setcookie('username', null, -1, '/');
        }
    ?>
    <title>Vortex - Home</title>
    <body class="default">
        <div class="sticky">
            <a href="../home/" style="margin-left:16px"><img src="../images/vortexFullLogo.png" alt="vortex logo" width="240px" height="auto"></a>
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
                    <img class="pfp" id="pfp" alt="profile picture" src="../images/maskdark.png" style="background-image:url('../images/accountpfps/<?php echo $_COOKIE["username"]; ?>.png')" width="48px" height="48px">
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
            <?php
            $conn = OpenCon(); // connect to the database
            $sql = "SELECT title, creator, views, description, videokey, tags FROM vortexvideos"; // sql string for the values we want
            $result = $conn->query($sql); // yoink them values
            $database = mysqli_fetch_all($result); // make the data actually usable
            $sorteddatabase = array(); // new array for sorting the database if we're currently searching for something

            $searchtag = $_POST['searchbar']; // grab the value the user searched for, if there is one
            $i = 0;
            if ($searchtag != null)
            {
                echo "<h3>Searching for " . $searchtag . ":</h3>";
                while ($i < count($database))
                {
                    $tags = explode("|", $database[$i][5]); // seperate all the tags into an array so we can iterate through them later
                    $j = 0;
                    while ($j < count($tags)) // later is now
                    {
                        if ($searchtag == $tags[$j])
                        {
                            if (!in_array($database[$i], $sorteddatabase)) // make sure we're not adding duplicate values (probably unnecessary here but good practice)
                            {
                                array_push($sorteddatabase, $database[$i]);
                            }
                        }
                        $j += 1;
                    }
                    if (str_contains(strtolower($database[$i][0]), strtolower($searchtag))) // do a raw strcontains() to search the title for any matching characters
                    {
                        if (!in_array($database[$i], $sorteddatabase)) // now we actually need to make sure the matching video hasn't been added by the tag search function yet
                        {
                            array_push($sorteddatabase, $database[$i]);
                        }
                    }
                    $i += 1;
                }
            }
            else
            {
                $sorteddatabase = $database; // if we aren't searching, set the sorted database to the raw database
            }
            $i = 0;
            while ($i < count($sorteddatabase)){ // dynamic thumbnails
                ?>
                <div class="inline thumbnail">
                    <div class="thumbnailfade"></div>
                    <a href="../video/?v=<?php echo $sorteddatabase[$i][4]; ?>"><img src="../videos/thumbnails/<?php echo $sorteddatabase[$i][4]; ?>.jpg" alt="video thumbnail" style="background-image:url('../images/thumbnailPlaceholder.png');" width="320" height="180"></a>
                    <div>
                        <img class="creatoricon" src="../images/maskmid.png" alt="creator icon" style="background-image:url('../images/accountpfps/<?php echo $sorteddatabase[$i][1]; ?>.png')" width="32" height="32">
                        <b>
                            <div class="inline thumbnailtitle" title="<?php echo $sorteddatabase[$i][0]; ?>" style="width:280px; text-overflow:ellipsis; overflow:hidden; white-space:nowrap;">
                                <?php echo $sorteddatabase[$i][0]; ?>
                            </div>
                        </b>
                        <div class="inline thumbnailcreator">
                            <?php echo $sorteddatabase[$i][1]; ?>
                        </div>
                    </div>
                </div>
                <?php
                $i += 1;
            }
            CloseCon($conn); // make sure to close the connection, not actually sure what this does but i think its good
            ?>
        </div>
    </body>
</html>
