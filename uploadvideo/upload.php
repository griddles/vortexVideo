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
            <a href="../home/" title="Vortex.com" style="margin-left:16px"><img src="../images/vortexFullLogo.png" width="240px"></a>
            <form class="searchform" method="post" action="index.php">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <div class="accountbox">
                <div class="account">
                    <?php
                    error_reporting(1);
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
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <p class="bodytext">
                <?php
                    include "../reqs/db_connection.php";
                    
                    $target_videodir = "../videos/";
                    $target_video = $_FILES["video"];
                    $target_videoname = $target_videodir . basename($_FILES["video"]["name"]); // grab all the required info for uploading the video
                    
                    $target_thumbdir = "../videos/thumbnails/";
                    $target_thumb = $_FILES["thumbnail"];
                    $target_thumbname = $target_thumbdir . basename($_FILES["thumbnail"]["name"]); // same but for the thumbnail

                    $video_tags = str_replace(",", "|", $_POST["videoTags"]);

                    $key = generate_key();

                    if (upload_file($target_video, $target_videoname, $target_videodir, 10000000000, "mp4", $key)) // run the upload for the video file
                    {
                        video_database($_POST["videoTitle"], $_POST["videoDesc"], $video_tags, $key); // put the video in the database
                        if (upload_file($target_thumb, $target_thumbname, $target_thumbdir, 100000000, "png", $key)) // upload the thumbnail file
                        { // we dont need a database entry for the thumbnail since the title is the key of the video, we can just reference $key.png, where $key is the key from the video record
                            echo "Video " . $target_videoname . " was uploaded successfully.";
                            compress("../videos/thumbnails/" . $key . ".png", "../videos/thumbnails/" . $key . ".jpg", 32);
                            unlink("../videos/thumbnails/" . $key . "/png");
                        }
                        else // error handling
                        {
                            echo "There was an unknown error uploading the thumbnail for your video. Your video will still work, but won't have a thumbnail until you give it one.";
                        }
                    }
                    else
                    {
                        echo "There was an unknown error uploading your video, please try again. If this error persists, contact customer support.";
                    }
                    
                ?>
            </p>
        </div>
    </body>
</html>