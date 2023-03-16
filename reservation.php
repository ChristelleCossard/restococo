<?php
require_once('templates/header.php');

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
<h1 align="center">Réservez votre table!</h1>

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
            
            
        </select>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Image</label>
        <input type="file" name="file" id="file">
    </div>
   <p align="center"> <input type="submit" value="Réserver"  name="saveDish" class="btn btn-primary" ></p>


</form>

<form method="POST" enctype="multipart/form-data">
Nom: <input type="text" name="nom"/> </br>
            </br>
            Prénom : <input type="text" name="prenom"/> </br>
            </br>
			Nombres : <?php
 
  $selected = '';
 
 
  echo '<select name="nombres">',"\n";
  for($i=0; $i<=50; $i++)
  {
 
    if($i == date('Y'))
    {
      $selected = ' selected="selected"';
    }
 
    echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
 
    $selected='';
  }
  echo '</select>',"\n";
?>
</br>
</br>
			<form action="reservation.php" method="post">
<script>$(function() {    $( "#datepicker" ).datepicker({ showOn: "button", buttonImageOnly: true, changeMonth: true, changeYear: true, minDate: new Date(1920, 1 - 1, 1)});});</script>
Date : <input type="text" id="datepicker" name="RÉSERVATION">
 
 
	<SELECT NAME="Rubrique" onChange='Choix(this.form)'>
	   <OPTION>-- Heures de la réservation ---</OPTION>
	   <OPTION>10:00 - 10:30</OPTION>
	   <OPTION>11:00 - 11:30</OPTION>
	   <OPTION>12:00 - 12:30</OPTION>
	   <OPTION>13:00 - 13:30</OPTION>
	   <OPTION>14:00 - 14:30</OPTION>
	   <OPTION>15:00 - 15:30</OPTION>
	   <OPTION>16:00 - 16:30</OPTION>
	   <OPTION>17:00 - 17:30</OPTION>
	   <OPTION>18:00 - 18:30</OPTION>
	   <OPTION>19:00 - 19:30</OPTION>
	   <OPTION>20:00 - 20:30</OPTION>
	   <OPTION>21:00 - 21:30</OPTION>
	   <OPTION>22:00 - 22:30</OPTION>
	   </SELECT>
 
			</br>
 
			Courriel : <input type="text" name="courriel"/> </br>
			 </br>
	<p><strong>Commentaires/détails</strong><br /><textarea cols="45" name="Commentaires" rows="10"></textarea></p>	</br>	
 
    <label for="releaseDate">Date de sortie</label>
            <input type="date" name="releaseDate" id="releaseDate" class="form-control">

    <p align="center"> <input type="submit" value="Réserver"  name="saveResa" class="btn btn-primary" ></p>
         
            </form>

<?php  ?>
<?php
require_once('templates/footer.php');
?>