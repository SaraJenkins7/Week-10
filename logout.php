<?php include('public/view/header.php');

unset($_SESSION['name']);
session_destroy();

$name = session_name();
$expire = strtotime (- 60 * 60 * 24 * 14);
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name, '', $expire, $path, $domain, $secure, $httponly);

?>

    <h2>Thank you for signing out, <?= $name ?> .<h2>
    <p><a href="public/view/vehicle_list.php"> Click here</a>to view our vehicle list.</p>

<?php include('public/view/footer.php');