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
?>