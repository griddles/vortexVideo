<html>
    <head>
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
    </head>
    <title>Vortex - Home</title>
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
        <?php
        include 'db_connection.php';
        $conn = OpenCon();
        // add database code here
        $sql = "SELECT Title, Creator, Views FROM vortexvideodetails";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        ?>
        <div class="body">
            <div class="inline thumbnail">
                <div class="thumbnailfade"></div>
                <a href="video.php"><img src="images/thumbnailPlaceholder.png" width="384" height="auto"></a>
                <div>
                    <img class="creatoricon" src="images/vortexLogo.png" width="32" height="32">
                    <p class="inline thumbnailtitle">
                        <?php
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                        ?>
                    </p>
                </div>
            </div>
            <div class="inline thumbnail">
                <div class="thumbnailfade"></div>
                <a href="video.php"><img src="images/thumbnailPlaceholder.png" width="384" height="auto"></a>
                <div>
                    <img class="creatoricon" src="images/vortexLogo.png" width="32" height="32">
                    <p class="inline thumbnailtitle">
                        <?php
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                        ?>
                    </p>
                </div>
            </div>
            <?php
        }
        else {
            echo "0 results";
            }
            CloseCon($conn);
            ?>
        </div>
    </body>
</html>