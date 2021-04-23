<?php 
    session_start();
    //Erreur de Formulaire
    if(isset($_SESSION['erreur'])){
      $arr_erreur=$_SESSION['erreur'];
      //Detruit les donnees d'erreur de la session
      unset($_SESSION['erreur']);
    }
     //Recuperation des Données du Formulaire
      if(isset($_SESSION['dataForm'])){
         $dataForm=$_SESSION['dataForm'];
         unset($_SESSION['dataForm']);
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
    <!-- Menu  -->
               <?php include_once "menu.php"  ;  ?>
    <!-- Fin Menu  -->
  <div class="container mt-3">
         <h3 class="text-center text-info">Formulaire d'inscription</h3>
  <form method="post" action="./../traitement/traitement_connexion.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" name="nom" class="form-control" 
       id="exampleInputEmail1" aria-describedby="emailHelp"
       placeholder="Enter le Nom"
       value="<?php if(!isset($arr_erreur['nom']) && isset($dataForm['nom'])) echo $dataForm['nom'];  ?>"
    >
    <?php if(isset($arr_erreur['nom'])):?>
        <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['nom'];  ?></small>
    <?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" name="prenom" class="form-control" 
       id="exampleInputEmail1" aria-describedby="emailHelp"
       placeholder="Enter le Prenom"
       value="<?php if(!isset($arr_erreur['prenom']) && isset($dataForm['prenom'])) echo $dataForm['prenom']; ?>"
     />

    <?php if(isset($arr_erreur['prenom'])):?>
        <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['prenom'];  ?></small>
    <?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" name="email" class="form-control" 
      id="exampleInputEmail1" aria-describedby="emailHelp"
      placeholder="Enter email"
      value="<?php if(!isset($arr_erreur['email']) && isset($dataForm['email'])) echo $dataForm['email']; ?>"
      />
    <?php if(isset($arr_erreur['email'])):?>
        <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['email'];  ?></small>
    <?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" 
      id="exampleInputPassword1" placeholder="Entrer un Mot de Passe"
      value="<?php if(!isset($arr_erreur['password']) && isset($dataForm['password'])) echo $dataForm['password'];?>"
    />
      
      <?php if(isset($arr_erreur['password'])):?>
          <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['password']; ?></small>
      <?php endif ?>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="confirm_password"   class="form-control" 
      id="exampleInputPassword1" 
      placeholder="Entrer la confirmation du Mot de Passe"
      value="<?php if(!isset($arr_erreur['confirm_password']) && isset($dataForm['confirm_password'])) echo $dataForm['confirm_password']; ?>"
      >
      <?php if(isset($arr_erreur['confirm_password'])):?>
          <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['confirm_password'];  ?></small>
      <?php endif ?>
  </div>
  <div class="form-group">
       <label for="">Role</label>
        <select class="form-control" name="role" id="">
          <option value=""></option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
        <?php if(isset($arr_erreur['role'])):?>
          <small id="emailHelp" class="form-text text-danger"><?php echo $arr_erreur['role'];  ?></small>
       <?php endif ?>
  </div>
   
    <button type="submit" class="btn btn-primary float-right" name="btn_submit"  value="register">Inscription</button>
   </form>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>