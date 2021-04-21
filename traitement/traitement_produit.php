<?php 
include_once 'fonctions.php';
include_once './../data/data_fonction_produit.php';
$arr_erreur=[];
if(isset($_POST['btn_submit'])){

    if($_POST['btn_submit']=='add_produit'){
       if(is_vide($_POST['libelle'])){
        $arr_erreur['libelle']="champ obligatoire";
       }
       if(is_vide($_POST['prix'])){
           $arr_erreur['prix']="champ obligatoire";
       }else{
           if(!is_numeric($_POST['prix'])){
            $arr_erreur['prix']="champ n'est pas numerique";
           }
       }

       if(is_vide($_POST['reference'])){
        $arr_erreur['reference']="champ obligatoire";
       }

       if(is_vide($_POST['qte_stock'])){
                $arr_erreur['qte_stock']="champ obligatoire";
                }else{
                if(!is_numeric($_POST['qte_stock'])){
                $arr_erreur['qte_stock']="champ n'est pas numerique";
                }
       }

       if(!valid_categorie($_POST['categorie'])){
        $arr_erreur['categorie']="Cocher au minimun deux categories";
       }
      
       if(count($arr_erreur)!=0){
           //Cas Erreur
           //Encodage , array vers chaine*
           $str_erreur=json_encode($arr_erreur);
           unset($_POST['btn_submit']);
           $str_data=json_encode($_POST);
           header("location:./../views/add_produit.php?erreur=$str_erreur&data_form=$str_data");
        }else{

            //count($arr_erreur)==0 
            //Pas Erreur
            //cas success; tous les champs sont valides
            //enregistrement Fichier json
            unset($_POST['btn_submit']);
             addProduit($_POST);
            //Redirection
                header('location:./../views/liste_produit.php');
        }

    }
  
}else{
    header('location:./../views/add_produit.php');
}