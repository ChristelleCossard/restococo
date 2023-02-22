<?php
require_once('templates/header.php');

if(!isset($_SESSION['user'])) {
    header('location: login.php');
}

require_once('lib/tools.php');
require_once('lib/dish.php');
require_once('lib/category.php');



$errors = [];
$messages = [];
$dish = [
    'title' => '',
    'description' => '',
    'ingredients' => '',
    'instructions' => '',
    'category_id' => '',
];

$categories = getCategories($pdo);

if (isset($_POST['saveDish'])) {
    $fileName = null;
   // var_dump($_FILES['file']);
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != ''){
         // la méthode getimagessize va retourner false si le fichier n'est pas une image
         $checkImage = getimagesize($_FILES['file']['tmp_name']);
         if ($checkImage !== false) {
            // Si c'est une image on traite
            //$fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            $fileName = uniqid().'-'.$_FILES['file']['name'];
          // $fileName = $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], _DISHES_IMG_PATH_.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }
    
    if (!$errors) {
    $res = saveDish($pdo, $_POST['category'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);
    //var_dump($res);
    
    if ($res) {
        $messages[] = 'Le plat a bien été sauvegardée';
    } else {
        $errors[] = 'Le plat n\'a pas été sauvegardée';
    }
}
$dish = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
    'ingredients' => $_POST['ingredients'],
    'instructions' => $_POST['instructions'],
    'category_id' => $_POST['category'],
];

}



?>
<h1 align="center">Ajouter un plat</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>



<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label"">Titre</label>
        <input type="text" name="title" id="title" class="form-control" value="<?=$dish['title'] ;?>">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?=$dish['description'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredients</label>
        <textarea name="ingredients" id="ingredients" cols="30" rows="5" class="form-control"><?=$dish['ingredients'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="instructions" class="form-label">Instructions</label>
        <textarea name="instructions" id="instructions" cols="30" rows="5" class="form-control"><?=$dish['instructions'] ;?></textarea>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category" id="category" class="form-select">
            
        <?php foreach ($categories as $category) { ?>
            <option value="<?=$category['id']; ?>" <?php if ($dish['category_id'] == $category['id']) { echo 'selected="selected"'; } ?>><?=$category['name'];?></option>
            <?php } ?>
            <?php
            /*
            <option value="1">Entrée</option>
            <option value="2">Plat</option>
            <option value="3">Dessert</option>
            */


            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
    <input type="submit" value="Enregistrer" name="saveDish" class="btn btn-primary">


</form>
<?php  ?>
<?php
require_once('templates/footer.php');
?>