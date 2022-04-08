<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="../reqs/globalStyle.css">
        <link rel="icon" href="../images/vortexLogo.png">
        <script src="../reqs/cookies.js"></script>
    </head>
    <?php
        include '../reqs/db_connection.php'; // connect to the database
        error_reporting(0);
        $conn = OpenCon();
        $sql = "SELECT title, creator, views, description, videokey FROM vortexvideos"; // yoink the desired values from the database
        $result = $conn->query($sql);
        
        $key = "SELECT videokey FROM vortexvideos"; // get a list of video keys seperate from the rest of the values
        $keyresult = $conn->query($key);

        $video_key = $_GET["v"];

        $database = mysqli_fetch_all($result); // grab the entire database (probably a really bad idea, there's definitely a better way to do this)

        $keys = mysqli_fetch_all($keyresult); // grab all the keys from the database
        $video_num = null; // set up some variables for the foreach loop
        $i = 0;
        foreach ($keys as $key) // check all the video keys to see if they match the one in the url
        {
            if ($key[0] == $video_key)
            {
                $video_num = $i + 1;
            }
            $i += 1;
        }
        if ($video_num == null)
        {
            echo "
            <body class='default'>
                <div class='body'>
                    <h1>Video ID error</h1>
                    <h3>" . $video_key . " is not a valid video ID</h3>
                    <h4>The video you're looking for isn't here, it may have been removed.</h4>
                </div>
            </body>
            ";
        }
        else
        {
            $video_num -= 1;
    ?>
    <title>Vortex - <?php
        echo $database[$video_num][0];
    ?></title>
    <body class="default" onload="getUser()">
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
            <div class="video">
                <video width="69%" height="auto" controls="true">
                    <source src="../videos/<?php echo $database[$video_num][4]; ?>.mp4">
                    your computer is too old to play a video in a browser
                </video>
                <div class="inline videodetails">
                    <h2 class="videotitle">
                        <?php
                            echo $database[$video_num][0]; // grab the video details depending on which video this is
                        ?>
                    </h2>
                    <b><p class="videocreator">
                        <?php
                            echo $database[$video_num][1]; // same
                        ?>
                    </p></b>
                    <p class="videoviews">
                        <?php
                            echo $database[$video_num][2]; // etc.
                        ?>
                        views
                    </p>
                    <?php
                        CloseCon($conn);
                    ?>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>
