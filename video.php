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
            <div class="navlink"><a href="about.html">About Us</a></div>
        </div>
        <div class="body">
            <div class="video">
                <img src="images/thumbnailPlaceholder.png" width="auto" height="100%">
                <div class="inline videodetails">
                    <!--<h2 class="videotitle">Title Placeholder Text</h2>
                    <p class="videoviews">187k views</p>-->
                    <?php
                        include 'db_connection.php';
                        $conn = OpenCon();
                        // add database code here
                        $sql = "SELECT Title, Creator, Views FROM vortexvideodetails";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                    ?>
                    <h2 class="videotitle">
                        <?php
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                        ?>
                    </h2>
                    <b><p class="videocreator">
                        <?php
                            echo $row[1]
                        ?>
                    </p></b>
                    <p class="videoviews">
                        <?php
                            echo $row[2];
                        ?>
                        views
                    </p>
                    <?php
                        } else {
                        echo "0 results";
                        }
                        CloseCon($conn);
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>