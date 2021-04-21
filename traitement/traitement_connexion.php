<?php 
include_once 'fonctions.php';
include_once './../data/data_fonction_user.php';
//$_SESSION(tableau associatif) : Sauvegarder des donnees de Connexion
   //Erreurs de Formulaire
   //Information du User connecter
   //Panier d'un utilisateur
//Les Données de session sont visibles dans toutes les pages
//Utilisation des Session
   //1-Ouvrir la session  session_start()
       //NB : La session doit etre ouverte une seule fois
   //2-Stocker les donnees dans la session
       // $_SESSION['cle']=valeur
   //3-  Destruction de la sesssion (deconnexion)  session_destroy()
 

//Ouvrir la sesson
    session_start();

//Verification du clique sur le bouton 
if(isset($_POST['btn_submit'])){

    //Verifie si on a cliqué sur le button de connexion 
    if($_POST['btn_submit']=='login'){
     //1-Validation des Champs,Scenario alternance
        $arr_erreur=[];
        //Champ vide
          if(is_vide($_POST['email'])){
               $arr_erreur['email']="Email  obligatoire";
           }else{
               //Champ Rempli
               //Enlever les espaces en debut et en fin de chaine
                $email=trim($_POST['email']);
                //La valeur saisi est un email
                   if(filter_var($email, FILTER_VALIDATE_EMAIL)==false){
                    $arr_erreur['email']="Veuillez saisir un Email";
                   }
           }

         //Champ vide
        if(is_vide($_POST['password'])){
            $arr_erreur['password']="password  obligatoire";
        }else{
               //Champ Rempli 
               //Enlever les espaces en debut et en fin de chaine
                 $password=trim($_POST['password']);
                  //La valeur Saisi contient au moins 6 caracteres
                 if(strlen($password)<6){
                  $arr_erreur['password']="password  doit contenir au minimum 6 caracteres";
                 }
        }

    //2-Cas Succes , Scenario Nominal
      if(count($arr_erreur)==0){
          $user= login($email,$password);
              if(is_null($user)){
                $_SESSION['erreur_login']= "Email ou Mot de Passe Incorrect";
                header('location:./../views/connexion.php');
              }else{
                  //Utilisateur est bien Connecté
                    $_SESSION['user']=$user;
                 if( $user['role']=="Admin"){
                    header('location:./../views/liste_produit.php');
                 }elseif($user['role']=="User"){
                    header('location:./../views/catalogue.php');
                 }
          }

      }else{
          //Erreur dans le Formulaire
            $_SESSION['erreur']=$arr_erreur;
            header('location:./../views/connexion.php');

      }

       
    }

    // Verifie si on a cliqué sur le button Inscription 

}
else{
    //User n'a pas cliqué sur un bouton
    header('location:./../views/connexion.php');
}