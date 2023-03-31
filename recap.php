<?php
    session_start();
  
?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
    
<title>Ajout produit</title>
    <title>Récapitulatif des produits</title>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="E-commerce">E-commerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Index.php">Index</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Recap.php">Recap</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="traitement.php">Traitement</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div> 




</nav>
<body>
    <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th class='text-success text-center'>Nom</th>",
                        "<th class='text-success text-center'>Prix</th>",
                        "<th class='text-success text-center'>Quantité</th>",
                        "<th class='text-success text-center'>Total</th>",
                    "</tr>",
                "</thead>",
                "<tboody>" ;
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            $total=$product['price']*$product['qtt'];//calcul concernant la condition mise en place,cela concerne l'augamentation du prix a chaque ajout sur un produit en rajoutant $total.
            //on a egalement calculer le product du price * le production quantité.
            
            echo "<tr>" ,
                    "<td class='text-center'>".$index."</td>",
                    "<td class='text-center'>".$product['name']."</td>",
                    "<td class='text-center'>".number_format($product['price'], 2, ", ", "&nbsp;"). "&nbsp;€</td>",
                    "<td class='text-center'>".$product['qtt']."</td>",//ajouter "qtt" ! 
                    "<td class='text-center'>".number_format($total, 2, ", ", "&nbsp;"). "&nbsp;€</td>",
                    "<td><a href='traitement.php?action=delete&id=".$index."' class='btn btn-dark btn-sm'><i class='bi-trash'>Supprimer</i></a></td>", //creer un nv <td> qui est relier a traitement.php,à l'utilisateur de supprimer un produit en session.
                    "<td><a href='traitement.php?action=Plus&id=".$index."' class='btn btn-success btn-sm'><i class='bi-trash'>+</i></a></td>",//déclarer les boutons dans recap,afin de pouvoir les afficher sur le navigateur.
                    "<td><a href='traitement.php?action=Moins&id=".$index."' class='btn btn-danger btn-sm'><i class='bi-trash'>-</i></a></td>",//déclarer les boutons dans recap,afin de pouvoir les afficher sur le navigateur.
                 "</tr>";
            $totalGeneral+= $total;//ajouter au totalGeneral,la variable $total creer tout au debut au niveau du calcul.
        }
        echo "<tr>",
                "<td  colspan=4>Total général : </td>",
                "<td  class='text-danger'><strong>".number_format($totalGeneral, 2, ", ","&nbsp;"). "&nbsp;€</strong></td>",
                "<td><a href='traitement.php?action=clear' class='btn btn-warning btn-sm'><i class='bi-trash'>Vider panier</i></a></td>",//toujours déclarer ce qu'on veut afficher dans la page du panier.
            "</tr>",
        "</tbody>";

    }
    

?>
</body>
</html>