<?php include('../view/header.php') ?>

<section>
    <header>
        <h1>Zippy Used Autos</h1>
    </header>
    <form action="register" method="post" id="register_form">
        <input type="hidden" name="action" values="register">
        <label>Please enter your first name:</label>
            <input type="text" id="register" name="register">
            <button type="submit">Register</button>
    </form>
</section>

<?php include('../view/footer.php') ?>