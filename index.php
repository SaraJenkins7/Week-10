<?php 

require_once('model/database.php');
require_once('model/vehicle_db.php');
require_once('model/type_db.php');
require_once('model/class_db.php');
require_once('model/make_db.php');

$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$vehicle = filter_input(INPUT_POST, 'vehicle', FILTER_SANITIZE_STRING);
$types = filter_input(INPUT_POST, 'types', FILTER_SANITIZE_STRING);
$makes = filter_input(INPUT_POST, 'makes', FILTER_SANITIZE_STRING);
$classes = filter_input(INPUT_POST, 'classes', FILTER_SANITIZE_STRING);
$vehicles = filter_input(INPUT_POST, 'vehicles', FILTER_SANITIZE_STRING);


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if ($action == NULL){
        $action = 'get_inventory';
    }
}

if ($action == 'get_inventory'){
    $model = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_STRING);
    if ($model == NULL || $model == FALSE){
        $model = 1;
    }
    $vehicles = get_inventory();
    include('public/view/vehicle_list.php');
}

$firstmame = filter_input(INPUT_POST, 'firstname', FILTER_UNSAFE_RAW);
if ($firstname == NULL){
    $firstname = filter_input(INPUT_GET, 'firstname', FILTER_UNSAFE_RAW);
    if ($firstname == NULL){
        $firstname = 'get_inventory';
    }
}

if(!$firstname){
    return 'false';
}

switch($action) {
    case 'register':
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        include('register.php');
        break;
    case 'logout':
        $firstname = filter_input(INPUT_POST, 'logout', FILTER_SANITIZE_STRING);
        include('logout.php');
        break;
}

if(isset($_POST['submit'])){
    $name = htmlentities($_POST['name']);
    setcookie('name', $name, time() + 60 * 60 * 24 * 14);
    
    header('Location: ../view/register.php');
}

if(isset($_COOKIE['name'])){
    echo 'Thank you for registering, ' .$_COOKIE['name']. '!';
} else {
    echo 'Registration not complete.';
}


?>

