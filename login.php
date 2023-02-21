<?php
require_once('templates/header.php');

$errors = [];
$messages = [];

$users = 
[
 [ 'email' => 'abc@test.com', 'password' => '1234'],
 [ 'email' => 'test@test.com', 'password' => 'test']
];

if (isset($_POST['loginUser'])) {
  //var_dump($_POST);
  $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $query->bindParam(':email', $_POST['email'], $pdo::PARAM_STR);
  $query->execute();
  $user = $query->fetch();


  //foreach ($users as $user) {
      //if ($user['email'] === $_POST['email'] && $user['password'] === $_POST['password']) {
          if ($user && $user['password']=== $_POST['password']) {
          $messages[] = 'connexion ok';
      }else{
          $errors[] = 'email ou mot de passe incorrect!';
      }
  }
//}
?>

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

<body class="text-center">
    <form class="form-signin" method="POST" enctype="multipart/form-data">

      <h1 class="h3 mb-3 font-weight-normal">Connexion</h1>
      <label for="email" class="sr-only">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required="" autofocus="">
      <label for="password" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
     
      <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">
    </form>
  

</body>
<?php
require_once('templates/footer.php');
?>