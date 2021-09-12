  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Nouri Khalil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link " aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="/test.php">Test</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="/exo.php">Exo</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="/notes.php">Notes</a>
                </li>
                <?php if($_SESSION["user"]):
                    if(in_array("ROLE_ADMIN", $_SESSION["user"]["role"])):  ?>
                <li class="nav-item active">
                    <a class="nav-link " href="/admin.php">Admin</a>
                </li>
               <?php endif ?>
                <li class="nav-item active">
                    <a class="nav-link btn btn-primary " href="/deconnection.php">Déconnection</a>
                </li>
                <?php else: ?>
                <li class="nav-item active">
                    <a class="nav-link " href="/inscription.php">inscription</a>
                </li>
               
                <li class="nav-item active">
                    <a class="nav-link " href="/connexion.php">Connexion</a>
                </li>
                
                
                <?php endif ?>
            </ul>
        </div>
    </div>
    </nav>
     
      
</nav>