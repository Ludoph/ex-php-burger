<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    $getnumero = $_GET['numero'];
    $recupCommande = $bdd->prepare('SELECT * FROM commande WHERE numero = ?');
    $recupCommande->execute(array($getnumero));
    if ($recupCommande->rowCount() > 0) {
        $deleteCommande = $bdd->prepare('DELETE FROM commande WHERE numero = ?');
        $deleteCommande->execute(array($getnumero));
        header('location: affiche-commande.php');
    } else {
        echo "Aucune commande trouvée";
    }

