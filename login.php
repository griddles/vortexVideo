<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - Log In</title>
    <body class="default">
        <div class="sticky">
            <a class="inline" href="index.php" title="Vortex.com" style="margin-left:16px"><img src="images/vortexFullLogo.png" width="240px"></a>
            <form class="inline" method="post" action="index.php">
                <input class="searchbar" autocomplete="off" placeholder="Search" name="searchbar" id="searchbar">
            </form>
            <a href="login.php"><button class="inline signin" id="signin">Sign In</button></a>
        </div>
        <div class="sidebar">
            <div class="navlink"><a href="index.php">Home</a></div>
            <div class="navlink"><a href="about.php">About Us</a></div>
        </div>
        <div class="body">
            <table>
                <tr>
                    <td class="formtable">
                        <div class="loginform">
                            <h2>Log In</h2>
                            <form method="post" action="loggedin.php">
                                <input class="signinfield" autocomplete="off" placeholder="Username" name="inputUser" id="inputUser">
                                <br>
                                <input class="signinfield" type="password" placeholder="Password" name="inputPass" id="inputPass">
                                <br>
                                <input class="button" type="submit">
                            </form>
                        </div>
                    </td>
                    <td class="formtable">
                        <div class="registerform">
                            <h2>Create Account</h2>
                            <form method="post" action="accountcreated.php">
                                <input class="signinfield" autocomplete="off" placeholder="Username" name="inputUser" id="inputUser">
                                <br>
                                <input class="signinfield" autocomplete="off" placeholder="Email" name="inputEmail" id="inputEmail">
                                <br>
                                <input class="signinfield" type="password" placeholder="Password" name="inputPass" id="inputPass">
                                <br>
                                <input class="button" type="submit">
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>