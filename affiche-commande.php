<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root','root');



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>affiche commande</title>
</head>
<body>
<?php
    $recupCommandes = $bdd->query('SELECT * FROM commande');
    while ($commande = $recupCommandes->fetch()) {
    ?>
        <div class="commande">
            <h2><?= $commande['client']; ?></h2>
            <ul>
                <li><?= $commande['plat']; ?></li>
                <li><?= $commande['dessert']; ?></li>
            </ul>
            <a href="supprimer-commande.php?numero=<?= $commande['numero']; ?>">
                <button>Supprimer la commande</button>
            </a>
            <a href="modifier-commande.php?numero=<?= $commande['numero']; ?>">
                <button>Modifier la commande</button>
            </a>
        </div>
    <?php
    }
    ?>
    <a href="client.php">retour</a>
</body>
</html>