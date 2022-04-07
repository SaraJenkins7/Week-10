<?php 

function get_inventory(){
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY vehicles.price OR vehicles.year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle_class($class_id){
    if(!$class_id){
        return "All Classes";
    }
    global $db;
    $query = 'SELECT * FROM vehicles WHERE class_id = class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_class = $vehicle['class'];
    return $vehicle_class;
}

function get_vehicle_type($type_id){
    if(!$type_id){
        return "All Types";
    }
    global $db;
    $query = 'SELECT * FROM vehicles WHERE type_id = type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_type = $vehicle['type'];
    return $vehicle_type;
}

function get_vehicle_make($make_id){
    if(!$make_id){
        return "All Makes";
    }
    global $db;
    $query = 'SELECT * FROM vehicles WHERE make_id = make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_make = $vehicle['make'];
    return $vehicle_make;
}

?>