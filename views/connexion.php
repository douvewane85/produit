<?php 
    session_start();
    //Erreur de Formulaire
    if(isset($_SESSION['erreur'])){
      $arr_erreur=$_SESSION['erreur'];
      //Detruit les donnees d'erreur de la session
      unset($_SESSION['erreur']);
    }else{
         //Pas Erreur de Formulaire 
         //Erreur de Connexion
         if(isset($_SESSION['erreur_login'])){
           $erreur_login=$_SESSION['erreur_login'];
           unset($_SESSION['erreur_login']);
         }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container mt-5">
         <h3 class="text-center text-info">Formulaire de Connexion</h3>
  <form method="post" action="./../traitement/traitement_connexion.php">
  <!--  Affichage du Message d'erreur de Connexion  -->
       <?php if(isset($erreur_login)):?>
          <div class="alert alert-danger" role="alert">
            <strong><?=$erreur_login ?></strong>
          </div>
    <?php endif ?>
  <!--  Fin Affichage du Message d'erreur de Connexion  -->

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <?php if(isset($arr_erreur['email'])):?>
        <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['email'];  ?></small>
    <?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
      <?php if(isset($arr_erreur['password'])):?>
          <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['password'];  ?></small>
      <?php endif ?>
  </div>
  
 
    <button type="submit" class="btn btn-primary float-right" name="btn_submit"  value="login">Connection</button>
    <div class="row ml-5">
      <a  id=""  href="register.php" role="button"> S'inscrire</a>
    </div>
   </form>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>