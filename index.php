<html>
    <head>
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
    </head>
    <title>Vortex - Home</title>
    <body class="default">
        <div class="sticky">
        <a href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline">
                <input class="searchbar" placeholder="Search">
            </form>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <?php
            include 'db_connection.php';
            $conn = OpenCon(); // connect to the database
            $sql = "SELECT title, creator, views, videopath FROM vortexvideos"; // yoink the desired values
            $result = $conn->query($sql);
            $database = mysqli_fetch_all($result); // not sure what this is doing, but i think if i remove it the program breaks so cool
            $i = 0;
            while ($i < count($database)){
                echo "
                <div class='inline thumbnail'>
                <div class='thumbnailfade'></div>
                <a href='video.php?0'><img src='images/thumbnailPlaceholder.png' width='384' height='auto'></a>
                <div>
                    <img class='creatoricon' src='images/vortexLogo.png' width='32' height='32'>
                    <div class='inline thumbnailtitle' title='" . $database[$i][0] . "' style='width:350px; text-overflow:ellipsis; overflow:hidden; white-space:nowrap;'>"
                     . $database[$i][0] .
                    "</div>
                </div>
            </div>
                ";
                $i += 1;
            }
            ?>
        </div>
    </body>
</html>
