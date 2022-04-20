<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <?php
        include "../reqs/db_connection.php";
        error_reporting(0);
    ?>
    <title>Vortex - My Account</title>
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
            <img class="accountpfp" src=../images/masklight.png style="background-image:url('../images/accountpfps/<?php echo $_COOKIE["username"]; ?>.png')" width="64px" height="64px">
            <h1 id="accountname" class="inline username"><?php echo $_COOKIE["username"]; ?></h1>
            <a href="../accountsettings/"><button class="settings button">Settings</button></a>
            <a href="../uploadvideo/"><button class="settings button">Upload Video</button></a>
            <div>
                <?php
                    $conn = OpenCon();
                    $sql = "SELECT title, creator, views, description, videokey FROM vortexvideos"; // yoink the desired values from the database
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
                    while ($i < count($sorteddatabase)){ // dynamic thumbnails 2 electric boogaloo
                        ?>
                        <div class="inline thumbnail">
                            <div class="thumbnailfade"></div>
                            <a href="../video/?v=<?php echo $sorteddatabase[$i][4]; ?>"><img src="../videos/thumbnails/<?php echo $sorteddatabase[$i][4]; ?>.png" style="background-image:url(\'../images/thumbnailPlaceholder.png\');" width="320" height="180"></a>
                            <div>
                                <img class="creatoricon" src="../images/maskmid.png" style="background-image:url('../images/accountpfps/<?php echo $sorteddatabase[$i][1]; ?>.png')" width="32" height="32">
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
                    CloseCon($conn);
                ?>
            </div>
        </div>
    </body>
</html>