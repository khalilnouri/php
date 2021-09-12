<?php
session_start();
include('./script/functions.php');
$data = openDB();
if (!empty($_POST)) {
    $securizedDataFromForm = treatFormData(
        $_POST,
        "title",
        "note",
    );
    extract($securizedDataFromForm, EXTR_OVERWRITE);
}
if (isset($title, $note)) {
    array_push($data['note'], [
        'title' => $title,
        'note' => $note,
    ]);
    writeDB($data);
}
$notes = $data["note"];
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Notes</title>
</head>
<body>
<?php include("./partial/_navBar.php"); ?>
    <div class="container">
        <h1>Page de prise de note</h1>
        <form method="post">
            <div class="form-group">
                <label class="col-form-label" for="title">titre de la note : </label>
                <input type="text" class="form-control border border-3" name="title">
            </div>
            <div class="form-group">
                <label for="note">La note : </label>
                <textarea name="note" class="form-control border border-3" rows="7"></textarea>
            </div>
            <input type="submit" class="btn btn-primary mt-3 mb-3" value="Ajouter">
        </form>
        <?php
        if ($notes) :
        ?>
            <div class="accordion mb-3" id="accordionNotes">
                <?php foreach ($notes as $index => $actualNote) : ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo "$index"; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo "$index"; ?>" aria-expanded="false" aria-controls="collapse<?php echo "$index"; ?>">
                                <?php echo $actualNote['title']; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo "$index"; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo "$index"; ?>" data-bs-parent="#accordionNotes">
                            <div class="accordion-body">
                                <pre>
                                  <?php echo $actualNote['note']; ?>
                                </pre>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php else : // if no note
        ?>
            <p>Vous n'avez pas encore de note</p>
        <?php endif ?>
    </div>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>