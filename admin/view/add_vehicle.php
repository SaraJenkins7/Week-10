<?php include '../view/header.php'; ?>
<main>
    <h1>Add Vehicle</h1>
    <form action="../controllers/vehicle.php" method="post" id="add_vehicle_form">
        <input type="hidden" name="action" values="add_vehicle">

        <label>Year:</label>
        <input type="text" name="year" />
        <br>
        <br>

        <label>Make ID:</label>
        <select name="make_id">
            <?php foreach ( $makes as $make ) : ?>
                <option value="<?php echo $make['make_id']; ?>">
                <?php echo $make['make']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>

        <label>Model:</label>
        <input type="text" name="model" />
        <br>
        <br>

        <label>Type ID:</label>
        <select name="type_id">
            <?php foreach ( $types as $type ) : ?>
                <option value="<?php echo $type['type_id']; ?>">
                <?php echo $type['type']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>

        <label>Class ID:</label>
        <select name="class_id">
            <?php foreach ( $classes as $class ) : ?>
                <option value="<?php echo $class['class_id']; ?>">
                <?php echo $class['class']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>

        <label>Price</label>
        <input type="text" name="price" />
        <br>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Vehicle" />
        <br>
    </form>
    <p>
        <a href="vehicle_list.php">View Full List</a>
        <a href="make_list.php">View/Edit Makes</a>
        <a href="class_list.php">View/Edit Classes</a>
        <a href="type_list.php">View/Edit Types</a>
    </p>
    <br>
</main>
<?php include '../view/footer.php'; ?>