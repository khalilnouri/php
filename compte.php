<?php 
session_start();
include("script/functions.php");

$data = openDB();
$users = $data["user"];
$role = false;

$email = $_SESSION['user']['email'];

foreach ($users as $user){
    if ($user["email"] === $email){
        $name = $user["name"];
        $firstName = $user["firstName"];
        $role = true;
        $photo = $user["photo"];
        break;
    }
}

if(!$role){
    header("Location: /");
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>mon compte</title>
  </head>
<body>
    <?php include('./partial/_navBar.php') ?>

    <div class="container">
        <h1>Mon compte</h1>

        <div class="card w-50">
            <div class="card-body">
                <p class="card-text">Nom : <?php echo $name; ?></p>
                <p class="card-text">Prénom : <?php echo $firstName; ?></p>
                <p class="card-text">Email : <?php echo $email; ?></p>
                <?php if ($photo): ?>
                    <p><img src="img/upload/<?php echo $photo; ?>" alt=""></p>
                <?php else: ?>
                <p class="card-text">Pas de photo de profil</p>
                <?php endif ?>   
                <a href="modifierCompte.php" class="btn btn-primary mt-2">Modifier mes informations</a>
            </div>
        </div>

    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>