<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "vortexuser";
    $dbpass = "test1234";
    $db = "vortexvideos";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function generateKey($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function create_account($username, $email, $password)
{
    $conn = OpenCon();
    $sql = "INSERT INTO `vortexaccounts` (`username`, `email`, `pass`) VALUES ('$username', '$email', '$password');";
    mysqli_query($conn, $sql);
}

function upload_video($title, $tags)
{
    $conn = OpenCon();
    $username = $_COOKIE["username"];
    $path = $title . ".mp4";
    $key = generateKey();
    $sql = "INSERT INTO `vortexvideos` (`title`, `creator`, `views`, `videopath`, `videokey`, `tags`) VALUES ('$title', '$username', 0, '$path', '$key', '$tags')";
    mysqli_query($conn, $sql);
}
?>