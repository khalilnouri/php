<?php 
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>inscription</title>
</head>

<body>
  <?php include("./partial/_navBar.php"); ?>

  </div>
  <div class="container">
    <h1>inscription</h1>
    <form action="" method="post">
      <div class="form-group">
        <label class="col-from-label" for="name">Nom : </label>
        <input type="text" name="title" id="title" class="form-control border border-3">
      </div>
      <div class="form-group">
        <label class="col-from-label" for="lastname">Prenom : </label>
        <input type="text" name="title" id="title" class="form-control border border-3">
      </div>
      <div class="form-group">
        <label class="col-from-label" for="email">Email : </label>
        <input type="text" name="title" id="title" class="form-control border border-3">
      </div>
      <div class="form-group">
        <label class="col-from-label" for="passoword">Mot de passe : </label>
        <input type="password" name="password" id="title" class="form-control border border-3">
      </div>
      <input class="btn btn-primary mb-4 mt-3" type="submit" value="S'inscrire">
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>

</html>