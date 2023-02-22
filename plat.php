<?php
require_once('templates/header.php');
require_once('lib/tools.php');
require_once('lib/dish.php');
require_once ('lib/pdo.php');



$id = (int)$_GET['id'];

$dish = getDishById($pdo, $id);
if ($dish) {

?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
    <img src="<?=getDishImage($dish['image']); ?>" class="d-block mx-lg-auto img-fluid" alt="<?=$dish['title']; ?>" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?=$dish['title']; ?></h1>
        <p class="lead"><?=$dish['description']; ?></p>
    </div>
</div>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h2>Ingrédients</h2>
        <?php
        $ingredients = linesToArray($dish['ingredients']);
    ?>
        <ul class="list-group">
            <?php foreach ($ingredients as $key => $ingredient) { ?>
                <li class="list-group-item"><?= $ingredient; ?></li>
            <?php } ?>
        </ul>

        </div>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h2>Instructions</h2>
        <?php
    $instructions = linesToArray($dish['instructions']);

    ?>
        <ol class="list-group list-group-numbered">
            <?php foreach ($instructions as $instruction) { ?>
                <li class="list-group-item"><?= $instruction; ?></li>
            <?php } ?>
            </ul>
    </div>

    <?php } else { ?>
    <div class="row text-center my-5">
        <h1>Plat introuvable</h1>
    </div>
<?php } ?>



<?php
require_once('templates/footer.php');
?>