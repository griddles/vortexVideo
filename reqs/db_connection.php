<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "vortexuser";
    $dbpass = "test1234";
    $db = "vortexvideos";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn; // make a connection to the database and return it
}

function CloseCon($conn)
{
    $conn -> close(); // idk why i have this here, could just call this one line every time, but i guess typing '->' is kinda annoying
}

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code; // use javascript to do a console_log
}

function generate_key($length = 16) {
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
    foreach ($keys as $key)
    {
        if ($key[0] == $randomString)
        {
            $randomString = generate_key();
            break;
        }
    }
    return $randomString;
}

function create_account($username, $email, $password)
{
    $conn = OpenCon();
    $sql = "INSERT INTO `vortexaccounts` (`username`, `email`, `pass`) VALUES ('$username', '$email', '$password');";
    mysqli_query($conn, $sql);
    CloseCon($conn);
}

function video_database($title, $desc, $tags, $key)
{
    $conn = OpenCon();
    $username = $_COOKIE["username"];
    $sql = "INSERT INTO `vortexvideos` (`title`, `creator`, `views`, `description`, `videokey`, `tags`) VALUES ('$title', '$username', 0, '$desc', '$key', '$tags')";
    mysqli_query($conn, $sql);
    CloseCon($conn);
}

function upload_file($target_file, $target_filename, $target_dir, $max_filesize, $file_type, $final_name)
{
    $fileType = strtolower(pathinfo($target_filename, PATHINFO_EXTENSION));
    console_log($fileType);
    // check if file already exists
    if (file_exists($target_filename)) 
    {
        echo "How the hell did you get this? Your video file somehow had the exact same name as one of the others in our database, which are completely randomized strings, of which there are almost 50 octillion different possibilities. You should probably contact us about this, it definitely should not happen.";
    }
    else
    {
        if ($target_file["size"] > $max_filesize) 
        {
            echo "Sorry, your file is too large. Files must be under 1gb.";
        }
        else
        {
            if ($fileType != $file_type)
            {
                echo "Sorry, the file must be in an " . $file_type . " format. More formats will be added in the future.";
            }
            else
            {
                if (move_uploaded_file($target_file["tmp_name"], $target_filename)) 
                {
                    rename($target_filename, $target_dir . $final_name . "." . $file_type);
                    return true;
                } 
                else
                {
                    return false;
                }
            }
        }
    }
}

function compress($source, $destination, $quality) {

    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($source);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($source);

    console_log(imagejpeg($image, $destination, $quality));

    return $destination;
}

function get_invalid_characters($str)
{
    $invalid_characters = [";", "/", "*", "+", "?", "$", "%", ",", "\\", "=", "^", "{", "}", "[", "]", ":", "~", "`", "<", ">", "|", " "];
    foreach ($invalid_characters as $char)
    {
        if (str_contains($str, $char))
        {
            return true;
        }
    }
}
?>