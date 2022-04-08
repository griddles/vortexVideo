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
    $conn = OpenCon();
    $sql = "SELECT videokey FROM vortexvideos";
    $sqlresult = $conn->query($sql);
    $keys = mysqli_fetch_all($sqlresult);
    $i = 0;
    foreach ($keys as $key)
    {
        if ($key[0] == $randomString)
        {
            $randomString = generateKey();
            break;
        }
        $i += 1;
    }
    return $randomString;
}

function create_account($username, $email, $password)
{
    $conn = OpenCon();
    $sql = "INSERT INTO `vortexaccounts` (`username`, `email`, `pass`) VALUES ('$username', '$email', '$password');";
    mysqli_query($conn, $sql);
}

function video_database($title, $tags, $key)
{
    $conn = OpenCon();
    $username = $_COOKIE["username"];
    $path = $title . ".mp4";
    $sql = "INSERT INTO `vortexvideos` (`title`, `creator`, `views`, `videopath`, `videokey`, `tags`) VALUES ('$title', '$username', 0, '$path', '$key', '$tags')";
    mysqli_query($conn, $sql);
}

function upload_file($target_file, $target_filename, $target_dir, $max_filesize, $file_type, $final_name)
{
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_filename, PATHINFO_EXTENSION));
    console_log($fileType);
    // check if file already exists
    if (file_exists($target_filename)) {
        echo "Due to an internal server confliction, your filename conflicted with a different file. Try renaming it. This problem should be fixed in a future update.";
        $uploadOk = 0;
    }
    // check file size
    if ($target_file["size"] > $max_filesize) {
        echo "Sorry, your file is too large. Files must be under 1gb.";
        $uploadOk = 0;
    }
    if ($fileType != $file_type)
    {
        echo "Sorry, the file must be in an .mp4 format. More formats will be added in the future.";
        $uploadOk = 0;
    }
    // check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, there was an unknown error. Try again.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($target_file["tmp_name"], $target_filename)) {
            echo "The file ". htmlspecialchars( basename( $target_file["name"])). " has been uploaded.";
            rename($target_filename, $target_dir . $final_name . "." . $file_type);
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>