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
      Enregistre l'email et password  
      dans le fichier des users   
   */
   function inscription(array $data){  

   }

   /* 
      Deconnecte l'utilisateur
   */
   function logout(){

   }

   login("aminata.ba1@ism.edu.sn","bapoulo");