<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - Home</title>
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
            <p class="bodytext">
                <?php
                    error_reporting(0);
                    $target_dir = "images/accountpfps/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }
                    // check if file already exists
                    if (file_exists($target_file)) {
                        echo "Due to an internal server confliction, your filename conflicted with a different file. Try renaming it. This problem should be fixed in a future update.";
                        $uploadOk = 0;
                    }
                    // check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        echo "Sorry, your file is too large. Files must be under 500kB.";
                        $uploadOk = 0;
                    }
                    // allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG and PNG files are allowed.";
                        $uploadOk = 0;
                    }
                    // check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, there was an unknown error. Try again.";
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            if (file_exists($target_dir . $_COOKIE["username"] . ".png"))
                            {
                                unlink($target_dir . $_COOKIE["username"] . ".png");
                            }
                            rename($target_file, $target_dir . $_COOKIE["username"] . ".png");
                            setcookie("pfp", $target_dir . $_COOKIE["username"] . ".png");
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    }
                ?>
            </p>
        </div>
    </body>
</html>