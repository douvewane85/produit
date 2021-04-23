<?php 
    //1-Verification si la session n'est pas déja ouverte
    if(session_status()==PHP_SESSION_NONE)
        session_start();

?>
<nav class="navbar navbar-expand-sm navbar-light bg-info">
    <a class="navbar-brand text-white" href="#">Ecommerce</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="catalogue.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <?php if((isset($_SESSION['user'])) && $_SESSION['user']['role']=="Admin"):?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produit</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item " href="add_produit.php">Add Produit</a>
                        <a class="dropdown-item " href="liste_produit.php"> Lister Produit</a>
                    </div>
                </li>
            <?php endif ?>
              
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Utlisateur</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item " href="register.php">Inscription</a>
                    <?php if(!(isset($_SESSION['user']))):?>
                      <a class="dropdown-item " href="connexion.php"> Connexion</a>
                    <?php endif ?>
                    <?php if((isset($_SESSION['user']))):?>
                       <a class="dropdown-item " href="./../traitement/traitement_deconnexion.php"> Deconnexion</a>
                    <?php endif ?>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>