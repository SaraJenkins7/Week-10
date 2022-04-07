<?php include('../view/header.php') ?>

<section>
    <header>
        <h1>Zippy's Used Autos</h1>
        <form action="." method="GET" id="vehicle_list_header" class="view_all">
            <input type="hidden" name="action" value="list_vehicles">
            <select name="type_id">
                <option value="0">View All Types</option>
                <?php foreach($vehicles as $vehicle) : ?>
                    <?php if($type_id == $vehicle['type_id']){ ?>
                        <option value="<?= $vehicle['type_id'] ?>"></option>
                        <?php } else { ?>
                        <option value="<?= $vehicle['type_id'] ?>"></option>
                        <?php } ?>
                        <option value="<?= $vehicle['type'] ?>"></option>
                <?php endforeach; ?>
            </select> 
            <select name="class_id">
                <option value="0">View All Classes</option>
                <?php foreach($vehicles as $vehicle) : ?>
                    <?php if($class_id == $vehicle['class_id']){ ?>
                        <option value="<?= $vehicle['class_id'] ?>"></option>
                        <?php } else { ?>
                        <option value="<?= $vehicle['class_id'] ?>"></option>
                        <?php } ?>
                        <option value="<?= $vehicle['class'] ?>"></option>
                <?php endforeach; ?>
            </select>
            <select name="make_id">
                <option value="0">View All Makes</option>
                <?php foreach($vehicles as $vehicle) : ?>
                    <?php if($make_id == $vehicle['make_id']){ ?>
                        <option value="<?= $vehicle['make_id'] ?>"></option>
                        <?php } else { ?>
                        <option value="<?= $vehicle['make_id'] ?>"></option>
                        <?php } ?>
                        <option value="<?= $vehicle['make'] ?>"></option>
                <?php endforeach; ?>
            </select>
        </form>
    </header>
    <main>
        <h1>Zippy's Inventory</h1>
        <p>Sort By:
            <input type="radio" id="price" name="sort" value="Price">
            <label for="price">Price</label>
            <input type="radio" id="year" name="sort" value="Year">
            <label for="year">Year</label>
            <button>Submit</button>
        </p>
        <br>
        <h2>Vehicle Type List</h2>
        <table>
            <tr>
                <th>Type</th>
                <th>Type ID</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($types as $type) : ?>
            <tr>
                <td><?php echo $type['type']; ?></td>
                <td><?php echo $type['type_id']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value="<?php echo $type['type_id']; ?>">
                    <input type="hidden" name="type" value="<?php echo $type['type']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <form action="../controllers/type.php" method="post" id="add_type">
            <label>Type:</label>
            <input type="text" name="action">
            <label>&nbsp;</label>
            <input type="submit" value="Add Type" />
        </form>
        <p>
            <a href="add_vehicle.php">Add Vehicle</a>
            <a href="vehicle_list.php">View Full List</a>
            <a href="make_list.php">View/Edit Makes</a>
            <a href="class_list.php">View/Edit Classes</a>
            <a href="type_list.php">View/Edit Types</a>
        </p>
        <br>
    </main>
</section>
<?php include '../view/footer.php'; ?>