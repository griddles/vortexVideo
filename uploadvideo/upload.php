<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <title>Vortex - Uploading...</title>
    <body class="default">
        <div class="sticky">
            <a class="inline" href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="../home/">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <?php
            error_reporting(0);
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
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <p class="bodytext">
                <?php
                    include "../reqs/db_connection.php";
                    
                    $target_videodir = "../videos/";
                    $target_video = $_FILES["video"];
                    $target_videoname = $target_videodir . basename($_FILES["video"]["name"]);
                    
                    $target_thumbdir = "../videos/thumbnails/";
                    $target_thumb = $_FILES["thumbnail"];
                    $target_thumbname = $target_thumbdir . basename($_FILES["thumbnail"]["name"]);

                    $video_tags = str_replace(",", "|", $_POST["videoTags"]);

                    $key = generateKey();

                    if (upload_file($target_video, $target_videoname, $target_videodir, 1000000000000, "mp4", $key))
                    {
                        video_database($_POST["videoTitle"], $_POST["videoDesc"], $video_tags, $key);
                    }

                    upload_file($target_thumb, $target_thumbname, $target_thumbdir, 1000000000, "png", $key);
                ?>
            </p>
        </div>
    </body>
</html>