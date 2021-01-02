<!-- barre de menu commune a toute les pages -->
<header id="header" class="skel-layers-fixed">
    <!-- liens vers les différentes pages du site -->
    <h1><a href='../General/Accueil.php' style="font-family:'Monotype Corsiva';text-transform:none;font-size:30px">MyCocktailBox</a></h1>
    <a href='../Recettes/Explorer.php'>Explorer les recettes</a>
    <a href='../Recettes/Rechercher.php'>Rechercher une recette</a>
    <a href='../Panier/MesRecettes.php'>Mes favoris</a>
    <?php
    // liens différents selon si l'utilisateur est connecté ou non
    if(isset($_SESSION['utilisateur'])) echo
    "<a href='../Utilisateur/Compte.php'>Mon compte</a>".
    "<a href='?deconnexion=true'>Déconnexion</a>";
    else echo
    "<a href='../Utilisateur/CreerCompte.php'>Créer un compte</a>".
    "<a href='../Utilisateur/Connexion.php'>Connexion</a>";
    ?>
</header>