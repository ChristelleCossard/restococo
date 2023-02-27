
if (isset($_POST['login'])){ // execution uniquement apres envoi du formulaire (test si la variable POST existe)
 $login = addslashes($_POST['login']); // mise en variable du nom d'utilisateur
 $pass = addslashes(($_POST['pass'])); // mise en variable du mot de passe
 

$verif_query=sprintf("SELECT * FROM Compte WHERE login='$login' AND password='$pass'"); 
$verif = mysql_query($verif_query) or die(mysql_error());
$row_verif = mysql_fetch_assoc($verif);
$admin = mysql_num_rows($verif);

 if ($admin) 
 { // On test s'il y a un utilisateur correspondant
      session_register("authentification"); // enregistrement de la session
  
  // déclaration des variables de session
  
  $_SESSION['nom'] = $row_verif['nom']; // Son nom
  $_SESSION['login'] = $row_verif['login']; // Son Login
  $_SESSION['droits'] = $row_verif['droits'];
   
 // header("Location:Contenus.php"); // redirection si OK
 if(isset($_SESSION['droits']))
        {
           if($_SESSION['droits']=="A") header('location:Contenus.php');
           elseif($_SESSION['droits']=="V")header('location:index3.php');
           else echo"Vous n'avez aucun droits d'accés";
        }
 }
else 