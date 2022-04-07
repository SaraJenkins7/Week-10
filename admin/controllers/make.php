<?php 

/* require_once('model/database.php');
require_once('model/make_db.php');
require_once('model/vehicle_db.php'); */ 

$make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if(!$make_id){
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'get_vehicle_make';
    }
}

switch($action){
    case "list_makes":
        $make = get_vehicle_make();
        include('admin/view/make_list.php');
        break;
    case "add_make":
        add_make($make);
        header("Location: .?action=list_makes");
        break;
    case "delete_make":
        if($make_id){
            try{
                delete_make($make_id);
            } catch (PDOException $e){
                $error = "You cannot delete a type if there are vehicles of that make in the inventory.";
                include('admin/view/error.php');
                exit();
            }
            header("Location: .?action=list_makes");
        }
        break;
    default:
        $make = get_vehicle_make($make_id);
        $vehicles = get_vehicles();
        include('admin/view/make_list.php');
}

?>