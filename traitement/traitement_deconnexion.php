<?php 
  //Traitement de Deconnexion
    //1-Ouvre la session
       session_start();
    //Detruire la variable de user de la session
      unset($_SESSION['user']);
    // fermer  la session
     session_destroy();
     header('location:./../views/catalogue.php');
     exit();
    


