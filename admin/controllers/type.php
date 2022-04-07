<?php 

/* require_once('model/database.php');
require_once('model/type_db.php');
require_once('model/vehicle_db.php'); */ 

$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if(!$type_id){
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'get_vehicle_type';
    }
}

switch($action){
    case "list_types":
        $type = get_vehicle_type();
        include('admin/view/type_list.php');
        break;
    case "add_type":
        add_type($type);
        header("Location: .?action=list_types");
        break;
    case "delete_type":
        if($type_id){
            try{
                delete_type($type_id);
            } catch (PDOException $e){
                $error = "You cannot delete a type if there are vehicles of that type in the inventory.";
                include('admin/view/error.php');
                exit();
            }
            header("Location: .?action=list_types");
        }
        break;
    default:
        $type = get_vehicle_type($type_id);
        $vehicles = get_vehicles();
        include('admin/view/type_list.php');
}

?>
