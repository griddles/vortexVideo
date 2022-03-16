<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device; initial=scale:1.0;">
        <link rel="stylesheet" href="globalStyle.css">
        <link rel="icon" href="images/vortexLogo.png">
        <script src="cookies.js"></script>
    </head>
    <title>Vortex - About Us</title>
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
            <b><p class="bodytext">
                note: the below paragraphs are written under the theoretical assumption that Vortex has become a successful company and is at least competing with, if not beating Youtube in the video hosting market. 
                This is mostly a placeholder to test long sections of text and will be replaced before Vortex actually launches as a website.
            </p></b>
            <h1>Who we are</h1>
            <p class="bodytext">
                Vortex is developed and run primarily by the Vortex team, composed of many developers and designers from all over the world. Many of these developers were a part of the Vortex beta development program, 
                which was run through the public Vortex Github page. These developers volunteered to work on Vortex, for the sole purpose of making the internet a better place. Some only added a few lines of code, others wrote thousands. 
                All of the major contributers were offered long term employment, and many of them accepted it. In addition, all who could be contacted were given a share in the company to help compensate them for their time and effort. 
                Finally, since it's official release, Vortex has hired many other developers and designers as part of our team.
            </p>
            <h1>What we do</h1>
            <p class="bodytext">
                Vortex's goal is to make the internet a better, safer place for all who use it. Before Vortex, there was a major monopoly on content creation services by Youtube. Although originally Youtube's services were incredible, 
                entertaining millions and giving thousands a full time job in content creation, slowly Youtube made more and more changes that conflicted directly with the desires of the users. They removed necessary features like 
                the dislike counter, and continued to tighten their rules on what content was acceptable. Slowly, Youtube demonitized more and more videos, stealing thousands of dollars from their creators, for no good reason. 
                Thats when I, the founder of Vortex, decided that enough was enough. I then founded Vortex, with the goal to at least become a competitor to Youtube. My intention was to do the opposite of what Youtube was doing: 
                <br>
                <br>
                Youtube slaps multiple unskippable ads on every single video, without creator permission? Vortex allows creators to control how many ads are on their videos, and only takes the bare minimum to keep itself alive 
                and to pay its workers well. 
                <br>
                Youtube tightens their content requirements even further, and takes thousands more from its creators? Vortex sets its guidelines as loose as possible, while still blocking actually harmful content. 
                <br>
                Youtube's algorithm tracks millions of user's history and interests? Vortex allows you to view a detailed log of the algorithm's take on your interests, and even edit it to your liking, so you can both get the content you like, 
                and keep your privacy.
                <br>
                Youtube makes incredibly disliked changes, and refuses to revert them when they are met with hatred? Vortex announces its changes weeks before they are released, and allows it's creators to vote on whether or not the change should 
                be implemented before and after the change is officially released.
                <br>
                <br>
                In conclusion, Vortex's goal is to provide a free, safe place on the internet for people to share their interests and hobbies, and maybe earn some money while they're at it.
            </p>
            <h1>Our Policies</h1>
            <p class="bodytext">
                Vortex aims to provide as good an experience as possible to both viewers and creators. To do that, we have a set of policies that everyone who works with us MUST adhere to. A full list is available at [link], but here's a quick summary:
                <ul class="bodytext">
                    <li>Vortex allows all creators to control the amount of ads on their videos, unless the company is in an emergency state.</li>
                    <li>Vortex only takes the minimum amount of money from creator's ad revenue that it needs to stay alive as a company, and leaves the rest to the creator.</li>
                    <li>Vortex keeps its content guidelines as loose as possible, without allowing for harmful content, including hate, disturbing images, and other similar content.</li>
                    <li>Vortex notifies all users of upcoming changes, and allows major creators to vote on them before and after release. Changes that fail to get more than 40% of the vote will be drastically changed or removed.</li>
                    <li>Vortex will not use an intrusive algorithm to feed users content, instead it uses an simplified algorithm based on tags the user has liked, popularity of videos, and other factors to determine content that is shown to users.</li>
                    <li>Vortex will always allow its users to view and edit the basic algorithmic data it has gathered, to reduce privacy concerns, as well as allowing users to disable all data collection that isn't completely necessary.</li>
                    <li>Vortex will never change these policies, unless a vote is passed through both the Vortex team AND all major content creators, with a score of over 80% in favor. This policy cannot be changed.</li>
                </ul>
            </p>
            <h1>Contact Us</h1>
            <p class="bodytext">
                this is all fake lol
                <ul class="bodytext">
                    <li>Phone: (830)-420-6969</li>
                    <li>Buisness Email: buisness@vortex.com</li>
                    <li>Customer Support Email: support@vortex.com</li>
                    <li>Mailing Address: 1234 N. Cool Person St., Denver, TX 54321</li>
                </ul>
            </p>
        </div>
    </body>
</html>
