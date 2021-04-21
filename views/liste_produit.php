<?php 
    include_once './../data/data_fonction_produit.php';
    $arr_produits=getAllProduit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
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
</body>
</html>