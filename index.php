<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        

        <title>Ajout produit</title>

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
        <h1 class="text-light bg-dark text-center">Ajouter un produit</h1>
        <form action="traitement.php?action=add" method="post"> 
            <p>
                <label class="text-danger">
                    Nom du produit :
                    <input type="text" name="name">
        </label>
</p>
<p>
    <label class="text-danger">
        Prix du produit : 
        <input type="number" step="any" name="price">
    </label>

</p>
<p>
    <label class="text-danger">
        Quantité désirée : 
        <input type="number" name="qtt" value="1">
    </label>

</p>
<p>
    
    <input class="btn btn-outline-success" type="submit" name="submit" value="Ajouter le produit">

    </p>
        </form>
    </body>
    
</html>