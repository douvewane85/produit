<?php 
  //Acces aux Donnees
   define("FILE_NAME","./../data/data_user.json");

   /* 
      Recherche si l'email et password existe 
      dans le fichier des users   
   */
   function login($email,$password){
        //Recuperation des Donnees du Fichier sous forme de Chaine
         $file_content=file_get_contents(FILE_NAME);
        //Convertion de la chaine en Table
         $arr_users=json_decode($file_content,true);
        //Verifier si l'email et le mot de passe existe dans le tableau $arr_users
        foreach ($arr_users as $user) {
             if($user['login']==$email && $user['password']==$password ) {
                 return $user;
             }
          }
          return null;   
        
   }
   /* 
     Recuperer les utilisateurs du fichier
     dans un tableau
   */
   function getAllUsers(){
   //Recuperation des Donnees du Fichier sous forme de Chaine
        $file_content=file_get_contents(FILE_NAME);
    //Convertion de la chaine en Tableau
        $arr_users=json_decode($file_content,true);
     return  $arr_users;
   }
   
   /* 
      Enregistre les donnes de l'utilisateur  
      dans le fichier des users   
      nom_complet,
      login,
      password,
      role
   */
   function inscription(array $user){ 
   
    //Recupere tous les utilisateurs du fichier sous forme de Tableau
      $arr_users=getAllUsers();
   //  Ajoute le User dans le Tableau
      $arr_users[]=$user;
   //Convertir le Tableau en Chaine
      $str_user=json_encode($arr_users,JSON_PRETTY_PRINT);
   //Ajouter la chaine dans le Fichier
    file_put_contents(FILE_NAME,$str_user); 

   }

   /* 
      Deconnecte l'utilisateur
   */
   function logout(){

   }

   login("aminata.ba1@ism.edu.sn","bapoulo");