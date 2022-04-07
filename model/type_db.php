<?php

function get_types($type_id){
    if(!$type_id){
        return "All Types";
    }
    global $db;
    $query = 'SELECT * FROM types WHERE type_id = type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_type = $vehicle['type'];
    return $vehicle_type;
}

function add_vehicle_type($type_id, $type){
    global $db;
    $query = 'INSERT INTO types
                (type_id, type)
              VALUES
                (:type_id, :type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle_type($type_id){
    global $db;
    $query = 'DELETE FROM types
              WHERE type_id = type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

?>