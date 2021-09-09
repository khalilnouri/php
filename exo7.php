<?php 
session_start();
include('./script/function.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="/js/bootstrap.min.js" defer></script>
  <title>Exercice 7</title>
</head>

<body>
    <?php include('./partial/_navBar.php') ?>

    <div class="container">
        <h1>Exercice 7</h1>

        <?php 

        require("script/cryptage.php");

        $text = "";
        $action = "";
        $key = "";
        $result="";
        $formValid = false;

            if (!empty($_POST)) {
                if (isset($_POST["text"])){
                    $text = strip_tags($_POST["text"]);
                }
                if (isset($_POST["key"])){
                    $key = strip_tags($_POST["key"]);
                }
                if (isset($_POST["action"])){
                    $action = strip_tags($_POST["action"]);
                }
                
                // Alert message !
                $arrAlert = [];

                if (empty($key)){
                    $arrAlert[] = "La clé est obligatoire. Ça doit être un mot pour Vigenère et un chiffre entre 1 et 10 pour César.";
                }else if (!preg_match('#^[a-zA-Z]*$#',$key) && ($action === "encodeVigenere" || $action === "decodeVigenere")){
                    $arrAlert[] = "La clé doit être un mot ! Pas d'accents, de caracères spéciaux et d'espace.";
                }else if(($key > 1 && $key > 10) && ($action === "encodeCesar" || $action === "decodeCesar")){
                    $arrAlert[] = "La clé doit être un chiffre entre 1 et 10.";
                }

                if (empty($text)){
                    $arrAlert[] = "Vous devez mettre un texte.";
                }else if(!preg_match('#^[a-zA-Z\s]*$#',$text)){
                    $arrAlert[] = "Pas d\'accents ni de caracères spéciaux dans le texte.";
                }
                if (empty($action)){
                    $arrAlert[] = "Quelle action doit-être fait sur le texte ?";
                }

                if (!empty($arrAlert)){
                    echo '<div class="alert alert-dismissible alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Attention !</strong> <ul>';
                        
                        for ($i = 0; $i < count($arrAlert); $i++){
                            echo "<li>$arrAlert[$i]</li>";
                        }
                        
                    echo '</ul>Essayez encore.
                        </div>';

                
                }else{
                    $formValid = !$formValid;
                }

                // It's ok, start encode or decode
                
                if($formValid){
                    

                    $text = strtoupper($text);
                    $key = strtoupper($key);

                    $tabVigenere = createVigenere();
                   


                    switch ($action) {
                        case "encodeVigenere":
                            $result = encode($text, $key, $tabVigenere);
                            break;
                        case "decodeVigenere":
                            $result = decode($text, $key, $tabVigenere);
                            break;
                      
                    }
                    
                    
                }
            }

        ?>

        <h3>Système d'encodage et de décodage de vigenère</h3>
        <p>Vous pouvez entrer un message et une clé ou la clé et le message à décoder.</p>
        <form method="post">
            <div class="mb-3">
                <label for="message" class="form-label">Le texte : </label>
                <textarea name="text" id="text" cols="30" rows="5" class="form-control"><?php echo $text ?></textarea>
            </div>
            <div class="mb-3">
                <label for="key" class="form-label">La clé : </label>
                <input type="text" name="key" id="key"  class="form-control" value="<?php echo $key ?>">
            </div>
            <div class="mb-3">
                <label for="action" class="form-label">Action à effectuer : </label>
                <select name="action" id="action" class="form-select" >
                    <option value="" selected>--Choisissez un action--</option>
                    <option value="encodeVigenere" <?php if($action == "encodeVigenere"){echo "selected";} ?>>Encodage par Vigenère</option>
                    <option value="decodeVigenere" <?php if($action == "decodeVigenere"){echo "selected";} ?>>Décodage par Vigenère</option>
                   
                </select>
            </div>
            <div class="mb-3">
                <input type="reset" value="Annuler"  class="btn btn-secondary" onclick="emptyForm();">
                <input type="submit" value="Coder ou décoder"  class="btn btn-primary" id="submit">
            </div>
            <div>
            <label for="result" class="form-label">Resultat : </label>
            <textarea name="result" id="result" cols="30" rows="5" class="form-control"><?php echo $result ?></textarea>
            </div>
            
        </form>

    </div>
  
<script>
    var action = document.querySelector("#action");
    var button = document.querySelector("#submit");
    bt();
    
    action.addEventListener('click', e =>{
        bt();
    });

    function bt(){
        if(action.value === "encodeVigenere" || action.value === "decodeVigenere"){
            button.value = "Vigenériser";
        }else if(action.value === "encodeCesar" || action.value === "decodeCesar"){ 
            button.value = "Cesariser";
        }else{
            button.value = "Coder ou décoder";
        }
    }

    function emptyForm(){
        var textValue = document.querySelector('#text');
        var keyValue = document.querySelector('#key');
        var result = document.querySelector('#result');
        text.defaultValue = "";
        keyValue.defaultValue = "";
        result.defaultValue = "";
        
    }
</script>
</body>
</html>