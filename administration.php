<?php
require_once('templates/header.php');
require_once('lib/user.php');

if(!isset($_SESSION['user']) && $user['role'] == "client") {
    header('location: login.php');
}

require_once('lib/tools.php');
require_once('lib/dish.php');
require_once('lib/category.php');

?>

<h1 align="center">Page d'administration</h1>

<?php
/*
var_dump($_SESSION);
*/



?>

<?php
require_once('templates/footer.php');
?>