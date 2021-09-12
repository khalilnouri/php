<?php 
session_start();
if($_SESSION["user"]){
    if(!in_array("ROLE_ADMIN", $_SESSION["user"]["role"])){
        header("Location:/");
    }
}else{
    header("Location:/");
}
include('./script/functions.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>page admin</title>
</head>
<body>
<?php include("./partial/_navBar.php"); ?>


    <div class="container">
        <h1>Page admin</h1>
        <p>Uniquement accessible à l'administrateur.</p>

    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>
