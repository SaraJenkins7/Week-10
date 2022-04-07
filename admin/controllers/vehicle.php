<?php

/* require_once('model/database.php');
require_once('model/vehicle_db.php');  */

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);


function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price){
    global $db;
    $query = 'INSERT INTO vehicles
                (year, make_id, model, type_id, class_id, price)
              VALUES
                (:year, :make_id, :model, :type_id, :class_id, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

?>