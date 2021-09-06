<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Exercice 6</title>
  </head>
  <body>
  <?php include("./partial/_navBar.php"); ?>

</div>
        <div class="container">
          <<h1>Exercice 6</h1>
       <?php
       $code = hexdec("223a");
       $result = "tout les gagnants ont joué, essayez";
       $response = "";
       if (!empty($_POST)) {
           if ($_POST["try"]) {
               $try = strip_tags($_POST["try"]);
           }
           if (isset($try)) {
               if ($code == $try) {
                   $result = "bien joué, le code est $try";
               } else {
                   $result = "non, le code n'est pas $try";
               }
           }
       }
       // TO DO with while
       $test = 0;
       $continue = true;
       $noInfinitLoop = 10000;
       while ($continue){
         if($test == $code){
           $continue = false;
           $response = strval($test);
          } else{
             $test++;
           }
         
         if($noInfinitLoop < 0){
           $continue = false;
          $response = "boucle infini";
          }
          $noInfinitLoop--;
       }
       
       ?>
       <p>le code à trouver est fixe, tentez votre chance ou faites en sorte que la machine vous aide à trouver la bonne réponse</p>
       <?php if ($response) : ?>
           <p>la réponse est : <?php echo $response; ?></p>
       <?php endif ?>
       <form method="post">
           <div class="form-group">
               <label class="col-form-label" for="try">trouver le code</label>
               <input type="text" class="form-control border border-3" name="try">
           </div>
           <a href="/exo6.php" class="btn btn-primary mt-3 mb-3">Annuler</a>
           <input type="submit" class="btn btn-primary mt-3 mb-3" value="essayer">
       </form>
       <p><?php echo $result; ?></p>
       </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>
