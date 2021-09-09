<?php 
session_start();
include('./script/function.php');
?>
<?php
include('./script/function.php');
$data = openDB();
if(!empty($_POST)){
  $securizedDataFromFrom = treatFormData(
    $_POST,
    "title",
    "note",
  );
  extract($securizedDataFromFrom, EXTR_OVERWRITE);
}
if(isset($title, $note)){
  array_push($data['note'],[
    'title'=>$title,
    'note'=> $note,
  ]);
  writeDB($data);
}
$notes =$data["note"];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Notes</title>
</head>
<body>
<?php include('./partial/_navBar.php') ?>
    <div class="container">
        <h1>Page de prise de note</h1>



        <form action="" method="post">
            <div class="mb-3">
                <label for="title">Titre de la note : </label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <label for="note">La note : </label>
                <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" value="Ajouter" class="btn btn-primary">
            </div>
        </form>

        <div>
            <?php
            // vérifie si le fichier jsonDB.json existe
            if ($notes) {
                $num = 1;
                echo '
                <div class="accordion" id="accordionNotes">';

                foreach ($notes as $value) {
                    
                    echo '
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-heading'.$num.'">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'.$num.'" aria-expanded="false" aria-controls="flush-collapse'.$num.'">'.
                                $value['title']
                            .'</button>
                            </h2>
                            <div id="flush-collapse'.$num.'" class="accordion-collapse collapse" aria-labelledby="flush-heading'.$num.'" data-bs-parent="#accordionNotes">
                            <div class="accordion-body"><pre>'. $value['note'] .'</pre></div>
                            </div>
                        </div>';
                    $num++;
                }

                echo '</div>';

            } else {
                echo "Aucune note existante !";
            }
            ?>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


</body>

</html>