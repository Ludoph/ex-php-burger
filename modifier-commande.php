<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$getnumero = $_GET['numero'];
$recupCommande = $bdd->prepare('SELECT * FROM commande WHERE numero = ?');
$recupCommande->execute(array($getnumero));
if ($recupCommande->rowCount() > 0) {
    $commandeInfo = $recupCommande->fetch();
    $plat = str_replace('<br />', '', $commandeInfo['plat']);
    $dessert = str_replace('<br />', '', $commandeInfo['dessert']);
    if (isset($_POST['submit'])){
        $plat_saisi = $_POST['plat'];
        $dessert_saisi = $_POST['dessert'];

        $updateCommande = $bdd->prepare('UPDATE commande SET plat = ?, dessert = ? WHERE numero = ?');
        $updateCommande->execute(array($plat_saisi, $dessert_saisi, $getnumero));

        header('location: affiche-commande.php');
    } 

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form class="commande" action="" method="POST">
        <label for="plat">Modifier le plat :</label>
        <input type="text" name="plat" id="plat" value="<?= $plat; ?>">
        <label for="dessert">Modifier le dessert :</label>
        <input type="text" name="dessert" id="dessert" value="<?= $dessert; ?>">
        <input type="submit" name="submit">
    </form>

    <a href="affiche-commande.php">Retour</a>
</body>
</html>