function setUser() // set the username cookie
{
    usernameElement = document.getElementById("username")
    username = usernameElement.innerHTML;
    document.cookie = "username=" + username
    console.log(username)
}

function getUser() // get the username cookie
{
    signinbutton = document.getElementById("signin")
    accountbutton = document.getElementById("account")
    username = document.cookie;
    parsedUser = username.split("; ")
    user = ""
    for (i = 0; i < parsedUser.length; i++)
    {
        if (parsedUser[i].includes("username="))
        {
            paddedUser = parsedUser[i].padEnd(parsedUser[i].length + 1)
            user = paddedUser.slice(9, -1);
        }
    }
    if (user == "")
    {
        accountbutton.style.display = "none";
    }
    else
    {
        signinbutton.style.display = "none";
    }
}

function signOut() // remove the username cookie
{
    document.cookie = "username="
}