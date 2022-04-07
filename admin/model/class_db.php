<?php

function get_classes($class_id){
    if(!$class_id){
        return "All Classes";
    }
    global $db;
    $query = 'SELECT * FROM classes WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_class = $vehicle['class'];
    return $vehicle_class;
}

function add_vehicle_class($class_id, $class){
    global $db;
    $query = 'INSERT INTO classes
                (class_id, class)
              VALUES
                (:class_id, :class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle_class($class_id){
    global $db;
    $query = 'DELETE FROM classes
              WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

?>