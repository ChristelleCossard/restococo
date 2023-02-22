<?php
  require_once('templates/header.php');
  require_once('lib/dish.php');


  $dishes = getDishes($pdo);

?>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1>Liste des plats</h1>
    </div>


    <div class="row">

      <?php foreach ($dishes as $key => $dish) { 
        include('templates/dish_partial.php');
      } ?>


    </div>

<?php
require_once('templates/footer.php');
?>