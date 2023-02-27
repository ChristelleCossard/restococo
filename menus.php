<?php
  require_once('templates/header.php');
  require_once('lib/dish.php');


  $dishes = getDishes($pdo);

?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1>Liste des menus</h1>
</div>



<?php
require_once('templates/footer.php');
?>
