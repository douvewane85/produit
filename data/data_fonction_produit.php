<?php 
   define("FILE_NAME","./../data/data_produit.json");
/* 
   PHP 
    file_get_contents:lire le contenu du fichier  et retourne une chaine
    file_put_contents:Ecrire une chaine dans le fichier   
 */

/* 
   Recuperer les Produits du Fichier
 */
function getAllProduit(){
 //Recuperation des Donnees du Fichier sous forme de Chaine
    $file_content=file_get_contents(FILE_NAME);
 //Convertion de la chaine en Table
  $arr_produits=json_decode($file_content,true);
  return $arr_produits;
}

/* 
   Enregister un Produit dans le Fichier
 */

function addProduit(array $produit){
    //JSON_PRETTY_PRINT permet d'indiquer que le tableau doit etre 
    //convertit dans une chaine sous format Json
    $arr_produit=getAllProduit();
    $arr_produit[]=$produit;
    $str_produit=json_encode($arr_produit,JSON_PRETTY_PRINT);
    file_put_contents(FILE_NAME,$str_produit);
}

/* 
   Rechercher un Produit dans le Fichier a travers sa Reference
 */
function getProduit($reference){
    
}

