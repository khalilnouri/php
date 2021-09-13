<?php 
session_start();
include('script/functions.php');

if (!empty($_POST)) {
    $securizedDataFromForm = treatFormData(
        $_POST,
        "name",
        "firstName",
        "email",
        "password",
    );

    extract($securizedDataFromForm, EXTR_OVERWRITE);
}

$data = openDB();

if (isset($name, $firstName, $email, $password)) {

    $valid = true;
    
    foreach($data['user'] as $user){
        if ($user['email'] === $email){
            $valid = false;
            break;
        }
    }

    if($valid){
        $passwordHash = password_hash($password, PASSWORD_ARGON2ID);
        
        array_push($data['user'], [
            'name' => $name,
            'firstName' => $firstName,
            'email' => $email,
            'password' => $passwordHash,
            'role' => ["ROLE_USER"],
        ]);
        writeDB($data);
        header("Location: /connexion.php");
    }
    

}




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Inscription</title>
  </head>
<body>
    <?php include('./partial/_navBar.php') ?>

    <div class="container">
        <h1>Inscription</h1>

        <?php 
            if (isset($valid) && !$valid){
                echo '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    L\'email existe déjà, choisissez-en un autre.
                </div>';
            }
        ?>

        <form method="post">
            <div class="mb-3">
                <label for="name">Nom : </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="firstName">Prénom : </label>
                <input type="text" name="firstName" id="firstName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <input type="submit" value="S'inscrire" class="btn btn-primary">
        </form>

    </div>
  

</body>
</html>