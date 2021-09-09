<?php
session_start();
//$_SESSION
include('./script/function.php');

if(!empty($_POST)){
  $securizedDataFromFrom = treatFormData(
    $_POST,
    "email",
    "password",
  );
  extract($securizedDataFromFrom, EXTR_OVERWRITE);
 $data = openDB();
 $users = $data["user"];
 $correctEmail = false;
 foreach($users as $user){
   if($email == $user["email"]){
     $correctEmail = true;
     $canConnect = password_verify($password, $user["password"]);
     if($canConnect){
        $_SESSION["user"] = [
          "name"=>$user["name"],
          "firsName" => $user["firstName"],
          "email"=> $user["email"],
          "role"=> $user["role"],
        ];
        header("Location: /index.php");
     }
     else{
        $badPassword = true;
     }
   }
 }
  $errorMessage = "l'email ou le mot de passe est invalide";
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Connexion</title>
</head>

<body>
  <?php include("./partial/_navBar.php"); ?>

  </div>
  <div class="container">
    <h1>Connexion</h1>
    <?php 
    if($errorMessage): ?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <p class="mb-0"><?php echo $errorMessage ?></p>
    </div>
    <?php endif ?>
    <form method="post">
     
      <div class="form-group">
        <label class="col-from-label" for="email">Email : </label>
        <input type="text" name="email" class="form-control border border-3">
      </div>
      <div class="form-group">
        <label class="col-from-label" for="password">Mot de passe : </label>
        <input type="password"   class="form-control border border-3" name="password">
      </div>
      <input class="btn btn-primary mb-4 mt-3" type="submit" value="Connexion">
    </form>
  </div>

  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>