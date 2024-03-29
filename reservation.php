<?php
require_once('templates/header.php');

require_once('lib/tools.php');
require_once('lib/dish.php');
require_once('lib/category.php');
require_once('lib/resa.php');



$errors = [];
$messages = [];
$resa = [
    'name_client' => '',
    'date' => '',
    'heure' => '',
    'guests' => '',
    'allergies' => '',
];

//$client_id = getClient($pdo);

if (isset($_POST['saveResa'])) {
   
  
    
    if (!$errors) {
    $res = saveResa($pdo, $_POST['name_client'], $_POST['date'], $_POST['heure'], $_POST['guests'], $_POST['allergies'] );
    //var_dump($res);
    
    if ($res) {
        $messages[] = 'La réservation a bien été sauvegardée';
    } else {
        $errors[] = 'La réservation n\'a pas été sauvegardée';
    }
}
$resa = [
    'name_client' => $_POST['name_client'],
    'date' => $_POST['date'],
    'heure' => $_POST['heure'],
    'guests' => $_POST['guests'],
    'allergies' => $_POST['allergies'],
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


<label for="name_client">Nom et Prénom:</label>
 <input type="text" name="name_client" id="name_client"  value="<?=$resa['name_client'] ;?>"> </br>
           
 <br>
 <label for="date">date:</label>
 <input type="date" name="date" id="date"  value="<?=$resa['date'] ;?>">
<br>
<br>
<select name="heure" id="heure" value="<?=$resa['heure'] ;?>">

	   <OPTION>-- Heure de la réservation ---</OPTION>
	   <OPTION>11:00 </OPTION>
	   <OPTION>12:00</OPTION>
	   <OPTION>13:00 </OPTION>
	   <OPTION>14:00</OPTION>
	   <OPTION>18:00</OPTION>
	   <OPTION>19:00 </OPTION>
	   <OPTION>20:00</OPTION>
	   <OPTION>21:00 </OPTION>
	   <OPTION>22:00 </OPTION>
	   </SELECT>

 </br>
 </br>
			Nombres d' invités: <?php
 
  $selected = '';
 
  echo '<select name="guests">',"\n";
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
 <label for="allergies">Allergies:</label>
 <input type="text" name="allergies" id="allergies"  value="<?=$resa['allergies'] ;?>"> </br>

</br>
			
<script>$(function() {    $( "#date" ).datepicker({ showOn: "button", buttonImageOnly: true, changeMonth: true, changeYear: true, minDate: new Date(1920, 1 - 1, 1)});});</script>

	
    <p align="center"> <input type="submit" value="Réserver"  name="saveResa" class="btn btn-primary" ></p>
         
</form>

<?php  ?>
<?php
require_once('templates/footer.php');
?>