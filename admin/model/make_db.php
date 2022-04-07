<?php

function get_makes($make_id){
    if(!$make_id){
        return "All Makes";
    }
    global $db;
    $query = 'SELECT * FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    $vehicle_make = $vehicle['make'];
    return $vehicle_make;
}

function add_vehicle_make($make_id, $make){
    global $db;
    $query = 'INSERT INTO makes
                (make_id, make)
              VALUES
                (:make_id, :make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle_make($make_id){
    global $db;
    $query = 'DELETE FROM makes
              WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

?>