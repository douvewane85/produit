<?php 
function is_vide($field){
    return empty($field);  
}
//is_numeric()
function valid_categorie($arr_categories){
   if(isset($arr_categories) && count($arr_categories)>=1){
       return true;
   }else{
       return false;
   }
}