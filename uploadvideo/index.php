<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
    </head>
    <title>Vortex - Upload</title>
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
            <div class="navlink"><a href="../home/">Home</a></div>
            <div class="navlink"><a href="../about/">About Us</a></div>
        </div>
        <div class="body">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="text" class="field" style="width:312px;" name="videoTitle" id="videoTitle" placeholder="Video Title">
                <br>
                <textarea class="field" style="width:312px; height:256px; resize:none;" name="videoDesc" id="videoDesc" placeholder="Video Description"></textarea>
                <br>
                <textarea class="field" style="width:312px; height:128px; resize:none;" name="videoTags" id="videoTags" placeholder="tags, seperated with ','"></textarea>
                <p class="bodytext">Select video to upload:</p>
                <input type="file" name="video" id="video">
                <br>
                <p class="bodytext">Select thumbnail for video:</p>
                <input type="file" name="thumbnail" id="thumbnail">
                <br>
                <input type="submit" value="Upload Video" name="submit" class="button" style="margin-top:16px;">
            </form>
        </div>
    </body>
</html>