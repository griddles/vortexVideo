<html>
    <head>
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
    </head>
    <title>Vortex - [video title]</title>
    <body class="default">
        <div class="sticky">
            <a href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="256"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <div class="video">
                <img src="images/thumbnailPlaceholder.png" width="auto" height="100%">
                <div class="inline videodetails">
                    <?php
                        include 'db_connection.php'; // connect to the database
                        $conn = OpenCon();
                        $sql = "SELECT Title, Creator, Views FROM vortexvideodetails"; // yoink the desired values from the database
                        $result = $conn->query($sql);
                        
                        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; // filter the url a bit
 
                        $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // strip it for the query stuff
                        $video_num = ltrim(strstr($url, '?'), '?'); // parse the query stuff out
                        
                        $database = mysqli_fetch_all($result); // grab the entire database (probably a really bad idea, there's definitely a better way to do this)
                    ?>
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
    </body>
</html>