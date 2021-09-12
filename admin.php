<?php 
session_start();

$roles = $_SESSION["user"]["role"];
$roleAdmin = false;

foreach($roles as $role){
    if($role == "ROLE_ADMIN"){
        $roleAdmin = true;
    }
}

if(!$roleAdmin){
    header("Location: /index.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier projet</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/bootstrap.min.js" defer></script>
</head>
<body>
<?php include("./partial/_navBar.php"); ?>


    <div class="container">
        <h1>Page admin</h1>
        <p>Uniquement accessible à l'administrateur.</p>

    </div>
  

</body>
</html>
