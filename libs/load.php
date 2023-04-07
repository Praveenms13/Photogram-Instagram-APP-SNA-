<?php

include "_Includes/User.class.php";
include "_Includes/Database.class.php";
include "_Includes/Session.class.php";
include "_Includes/UserSession.class.php";
global $__DBconfig;
global $__DBconfigPath;
$__DBconfigPath = dirname(is_link($_SERVER['DOCUMENT_ROOT']) ? readlink($_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT']);
// echo "Returned Path: " . $__DBconfigPath;
if ($_SERVER['APPLICATION_ENV'] == "Production") {
    $__DBconfig = file_get_contents($__DBconfigPath . "/../config_files/photogram.json");
}
<<<<<<< HEAD
if ($_SERVER['APPLICATION_ENV'] == "Dev") {
    // keep the config file outside the web root /var/www/|till here|/config_files/photogramDev.json
=======
if ($_SERVER['APPLICATION_ENV'] == "Dev") { 
>>>>>>> parent of ccbac7e (fix)
    $__DBconfig = file_get_contents($__DBconfigPath . "/config_files/photogramDev.json");
}
Session::start();

function get_config($key, $default_key = 0)
{
    global $__DBconfig;
    $config = json_decode($__DBconfig, true);
    if (isset($config[$key])) {
        return $config[$key];
    } else {
        return $default_key;
    }
}
function loadTemplate($file_form)
{
    include $_SERVER['DOCUMENT_ROOT'] . get_config('path') . "template/$file_form.php";
}
function loadAccess($file)
{
    include $_SERVER['DOCUMENT_ROOT'] . get_config('path') . "access/$file.php";
}
