<?php
    session_start();
    if(isset($_GET['action'])){ 
        switch($_GET['action']){ //Permet d'ajouter le panier.
            //switch case : on à selectionner un ensemble d'instructions à éxecuter en fonction de la valeur d'une variable.
                                // L'instruction switch est utilisée pour effectuer différentes actions en fonction de différentes conditions.
            case "add": // on la egalement ajouter dans l'index.php afin de relier les deux fichier entre eux.
                if(isset($_POST["submit"])){
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
                    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);
                    if($name && $price && $qtt){
                        $product = [
                            "name" => $name,
                            "price" => $price,
                            "qtt" => $qtt,
                            "total" =>$qtt*$price,
                        ];
                        $_SESSION["products"][] = $product;
                        $_SESSION["message"] = "Produit enregistré avec succès !";
                    }
                    else $_SESSION["message"] = "Les données saisies sont incorrectes !";
                }
                else $_SESSION["message"] = "Vous devez soumettre le formulaire !";
                break;
            case "delete": //permet à l'utilisateur de supprimer un produit en session.
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])){
                    $deletedProd = $_SESSION["products"][$_GET["id"]];
                    unset($_SESSION["products"][$_GET["id"]]);
                    $_SESSION["message"] = "Le produit ".$deletedProd["name"]." a été supprimé !";
                    header("Location: recap.php");
                    die();
                }
                else $_SESSION["message"] = "Action impossible !";
                break;
            case "clear": unset($_SESSION["products"]); // fonction pour supprimer tout le panier c'est a dire supprimer le contenue de ce qu'il y'a en session.
                header("Location: recap.php");
                die();
                break;


            case "Plus" :  
                
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])){ //pert à l'utilisateur ajouter autant d'article qui veut avec "+" . 
                        $product = $_SESSION["products"][$_GET["id"]];// a la variable + on va chercher dans la session les produits et on recupere sont ID
                        $_SESSION["products"][$_GET["id"]]["qtt"]++;//Augmenter la quantité en incrementant ++ a la fin.
                        header("Location: recap.php");
                        die();
                    
                    
                   
                }
                
                break;
            case "Moins" :  //permet à l'utilisateur de diminuer autant d'article qu'il veut avec "-".

                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])){// Si la variable get id est defini et QUE LA VARIBLE GET PRODUCT ET SONT ID EST DEFINIT alors, ON FAIT !
                        $product = $_SESSION["products"][$_GET["id"]];// a la variable + on va chercher dans la session les produits et on recupere sont ID
                        $_SESSION["products"][$_GET["id"]]["qtt"]--;//Diminuer la quantité en incrementant avec -- a la fin.
                        header("Location: recap.php");

                        if($_SESSION["products"][$_GET["id"]]["qtt"] == 0){  // si le produit est egal 
                            unset($_SESSION["products"][$_GET["id"]]); // alors on supprime de qu'on atteint 0.
                            header("Location: recap.php");
                        }
                    die();
                    }
                   
                break;
    
         

    }

}



header("Location:index.php");

   

?>











