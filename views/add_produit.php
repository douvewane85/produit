
<?php
    session_start();
    //Page est accessible seulemement aux Admin connectés
    //User n'est pas Connecté ou User est  connecté mais n'a pas le role Admin
      if(!((isset($_SESSION['user'])) && $_SESSION['user']['role']=="Admin")){
           header("location:catalogue.php");
           exit();
      }
    if(isset($_GET['erreur']) && isset($_GET['data_form'])){
      $arr_erreur=json_decode($_GET['erreur'],true);
      $arr_data=json_decode($_GET['data_form'],true);
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<!-- Menu  -->
<?php include_once "menu.php"  ;  ?>
<!-- Fin Menu  -->
<div class="container mt-3">
<form  action="./../traitement/traitement_produit.php"  method="post">
  <div class="form-group">
    <label >Reference</label>
    <input type="text" class="form-control" name="reference" placeholder="" 
         value="<?php  if(!isset($arr_erreur['reference']) 
                  && isset($arr_data['reference']) ) 
                  echo $arr_data['reference']; else echo ''; ?>"
    />
    <?php
      if(isset($arr_erreur['reference'])){
    ?>
         <span class="text-danger"><?php echo $arr_erreur['reference'];  ?> </span>
    <?php
      }
    ?>
  </div>
  <div class="form-group">
    <label for="">Libelle</label>
    <input class="form-control" type="text" placeholder=""  name="libelle"
    value="<?php  if(!isset($arr_erreur['libelle']) && isset($arr_data['libelle']) ) echo $arr_data['libelle']; else echo ''; ?>">
    <?php
      if(isset($arr_erreur['libelle'])){
    ?>
         <span class="text-danger"><?php echo $arr_erreur['libelle'];  ?> </span>
    <?php
      }
    ?>
  </div>
  <div class="form-group">
    <label >Prix</label>
    <input class="form-control" type="text" placeholder="Default input"  name="prix">
    <?php
      if(isset($arr_erreur['prix'])){
    ?>
         <span class="text-danger"><?php echo $arr_erreur['prix'];  ?> </span>
    <?php
      }
    ?>
  </div>
     <div class="row mb-2">
            <div class="col-md-6">
                <label for="">Qte en Stock</label>
                <input class="form-control" type="text" placeholder="Default input"  name="qte_stock">
      <?php
               if(isset($arr_erreur['qte_stock'])){
      ?>
             <span class="text-danger"><?php echo $arr_erreur['qte_stock'];  ?> </span>
    <?php
      }
    ?>
            </div>
           <div class="col-md-6">
            <label >Montant</label>
            <input class="form-control" type="text" readonly placeholder="Default input" name="montant">
          </div>
     </div>
  <div class="form-group">
       <label>Description</label>
       <textarea class="form-control" id="" rows="3"  name="description"></textarea>
  </div>
    <div class="row">
    Disponible
        <div class="col-md-3">
            <div class="form-check">
            <input class="form-check-input" type="radio" name="disponible"  value="oui" >
            <label class="form-check-label" for="">
              Oui
            </label>
            </div>
        </div>
        <div class="col-md-3">    
            <div class="form-check">
            <input class="form-check-input" type="radio" name="disponible" value="non" checked>
            <label class="form-check-label" for="">
                Non
            </label>
            </div>
        
        </div>
    </div>

      <div class="row">
            <div class="form-check form-check-inline mt-2">
                <label class="form-check-label  mr-2" for="">Alimentaire</label>
                    <input class="form-check-input " name="categorie[]" type="checkbox"  value="Alimentaire">
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label mr-2" for="">Cosmetique</label>
                    <input class="form-check-input  "   name="categorie[]" type="checkbox" value="Cosmetique"> 
            </div>
            <?php
               if(isset($arr_erreur['categorie'])){
      ?>
             <span class="text-danger"><?php echo $arr_erreur['categorie'];  ?> </span>
    <?php
      }
    ?>
      
      </div>  

     
     <div class="row">
     <div class="col-md-9">
         <button type="reset" class="btn btn-secondary  float-right" >Annuler</button>
     </div>
     <div class="col-md-3">
         <button type="submit" class="btn btn-info  float-right" name="btn_submit"  value="add_produit">Enregistrer</button>
     </div>  
     </div>
    
</form>

</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>