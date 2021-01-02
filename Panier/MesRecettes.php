<?php include_once '../General/GestionConnexion.php';
include_once '../Recettes/FonctionsRecettes.php';
include_once('../Donnees.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mes favoris | MyCocktailBox</title>

    <?php include '../General/Head.html'?>
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="../Panier/BoutonFavoris.js"></script>
</head>

<body>

<?php include '../General/Header.php' ?>

<section class="wrapper style1">

    <!-- affichage des fiche de recettes favoris -->
    <div id="resultats" class="inner">
        <?php
        global $Recettes;
        global $mysqli;
        // parcour de la liste des recettes et comparaison avec la liste des favoris
        if(isset($_SESSION['utilisateur'])) {
            foreach ($Recettes as $key => $recette) {
                // si l'utilisateur est connecté, recherche des recettes dans la base de donnée
                $resultat = query($mysqli,
                    "SELECT * FROM Panier WHERE login='".$_SESSION['utilisateur'].
                    "' AND boisson='".addslashes($recette['titre'])."'");
                if(1 == mysqli_num_rows($resultat)){
                    echo genererFicheRecette($recette,null);
                }
            }
        } else {
            foreach ($Recettes as $key => $recette) {
                // si l'utilisateur n'est pas connecté, recherche des recettes dans le tableau de session
                if(in_array(addslashes($recette['titre']), $_SESSION['favoris'])) {
                    echo genererFicheRecette($recette,null);
                }
            }
        }
        ?>
    </div>
</section>

<?php include '../General/Footer.php' ?>

</body>

</html>