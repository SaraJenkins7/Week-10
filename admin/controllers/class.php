<?php 

/* require_once('model/database.php');
require_once('model/class_db.php');
require_once('model/vehicle_db.php');  */

$class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if(!$class_id){
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);

if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'get_vehicle_class';
    }
}

switch($action){
    case "list_classes":
        $class = get_vehicle_class();
        include('admin/view/class_list.php');
        break;
    case "add_class":
        add_class($class);
        header("Location: .?action=list_classes");
        break;
    case "delete_class":
        if($class_id){
            try{
                delete_class($class_id);
            } catch (PDOException $e){
                $error = "You cannot delete a type if there are vehicles of that class in the inventory.";
                include('admin/view/error.php');
                exit();
            }
            header("Location: .?action=list_classes");
        }
        break;
    default:
        $class = get_vehicle_class($class_id);
        $vehicles = get_vehicles();
        include('admin/view/class_list.php');
}

?>