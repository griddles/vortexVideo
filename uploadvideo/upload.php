<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <script src="../reqs/cookies.js"></script>
    </head>
    <title>Vortex - Home</title>
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
                    $target_dir = "../videos/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    console_log($fileType);
                    // check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
                        if(strstr($mime, "video/")){
                            $uploadOk = 1;
                        }
                        else {
                            echo "File is not a video.";
                            $uploadOk = 0;
                        }
                    }
                    // check if file already exists
                    if (file_exists($target_file)) {
                        echo "Due to an internal server confliction, your filename conflicted with a different file. Try renaming it. This problem should be fixed in a future update.";
                        $uploadOk = 0;
                    }
                    // check file size
                    if ($_FILES["fileToUpload"]["size"] > 1000000000000) {
                        echo "Sorry, your file is too large. Files must be under 1gb.";
                        $uploadOk = 0;
                    }
                    if ($fileType != "mp4")
                    {
                        echo "Sorry, the file must be in an .mp4 format. More formats will be added in the future.";
                        $uploadOk = 0;
                    }
                    // check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, there was an unknown error. Try again.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            if (file_exists($target_dir . $_COOKIE["username"] . ".mp4"))
                            {
                                unlink($target_dir . $_COOKIE["username"] . ".mp4");
                            }
                            upload_video($_POST["videoTitle"], $_POST["videoTags"]);
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                ?>
            </p>
        </div>
    </body>
</html>