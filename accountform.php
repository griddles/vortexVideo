<html>
    <head>
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
    </head>
    <title>Vortex - Create an Account</title>
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
            <div class="accountform">
                <form method="post" action="accountcreated.php">
                    <input placeholder="Username" name="inputUser" id="inputUser">
                    <br>
                    <input placeholder="Email" name="inputEmail" id="inputEmail">
                    <br>
                    <input placeholder="Password" name="inputPass" id="inputPass">
                    <br>
                    <input type="submit">
                </form>
            </div>
        </div>
    </body>
</html>