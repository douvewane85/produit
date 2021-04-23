<?php 
     session_start();
    //Page est accessible seulemement aux Admin connectés
      //User n'est pas Connecté ou User est  connecté mais n'a pas le role Admin
    if(!((isset($_SESSION['user'])) && $_SESSION['user']['role']=="Admin")){
         header("location:catalogue.php");
         exit();
    }
    include_once './../data/data_fonction_produit.php';
    $arr_produits=getAllProduit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
       <!-- Menu  -->
            <?php include_once "menu.php"  ;  ?>
       <!-- Fin Menu  -->
    <div class="container mt-5">
       <div class="row mb-2">
            <div class="col-3">
              <a  href="add_produit.php" class="btn btn-success btn-lg btn-block">Nouveau Produit</a>
            </div>
       </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                   
                    <th scope="col">Reference</th>
                    <th scope="col">Libelle</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($arr_produits as  $produit) {
                ?>
                    <tr>                   
                        <td><?=$produit['reference'] ?></td>
                        <td><?=$produit['libelle'] ?></td>
                        <td>
                        <button type="button" class="btn btn-outline-primary ">Detail</button>
                        <button type="button" class="btn btn-outline-success">Panier</button>
                        <button type="button" class="btn btn-outline-warning">Modifier</button>
                        </td>
                    </tr>
             <?php 
                }
             ?>
                </tbody>
                </table>
    
</div>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>