<?php 
session_start();
include('./script/functions.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Test</title>
  </head>
  <body>
  <?php include("./partial/_navBar.php"); ?>

</div>
<p>resultats php</p>
<pre>
=================================

<?php 

if(!empty($_POST)){
    $theFile=$_FILES['path'];
    $theFileOnServer = $_FILES['tmp_name'];
    $autorizedMine= ["image/jpeg", "image/jpg", "image/gif","image/png"];
    $testMine = mime_content_type($theFileOnServer);
    if(!in_array($testMine, $autorizedMine)){
      $errorMessage = "le fichier n'est pas reconnu comme une image";
    }
    if(!is_uploaded_file($theFileOnServer)){
      $errorMessage = "il y a eu une erreur d'upload du fichier";
    }
    $filrSize = filesize($theFileOnServer);
    if(99000 < $filrSize){
      $errorMessage = "le fichier est trop volumineux";
    }
    if(!$errorMessage){
      $originalFileName = basename($theFile['name']);
      $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
      $mainName = pathinfo($originalFileName, PATHINFO_FILENAME);
      $tmpCleanedName = preg_replace("/\s/", "-", $mainName);
      $tmpCleanedName = trim($tmpCleanedName, "-");
      $finalName = $cleanedName . uniqid() . '.' . $ext;
      $distination = UPLOADFOLDER . $finalName;
      $succesUpload = move_uploaded_file($theFileOnServer, $distination);
      if(!$succesUpload){
        $message = "OK, nous avon bien uploade le fichier";
      } else{
        $message = "il ya eu une soucis lors de l'upload";
      }

    };
}





?>

=================================
</pre>

<?php if($errorMessage): ?>
  <p><?php echo $errorMessage; ?></p>
<?php endif ?>
<?php if($message): ?>
  <p><?php echo $message; ?></p>
<?php endif ?>

<form method="post" enctype="multipart/form-data">
     
      <div class="form-group">
        <label class="col-from-label" for="path">votre fichier : </label>
        <input type="file"   class="form-control border border-3" name="path">
      </div>
      <input class="btn btn-primary mb-4 mt-3" type="submit" value="Uploader" name="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>
