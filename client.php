<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root','root');
if(isset($_POST['submit'])){
    if(!empty($_POST['client'] AND !empty($_POST['plat']) AND !empty($_POST['dessert']))){
        $client = $_POST['client'];
        $plat = $_POST['plat'];
        $dessert = $_POST['dessert'];
        $insertCommande = $bdd->prepare('INSERT INTO commande (client,plat,dessert) VALUES (?, ?, ?)');
        $insertCommande->execute(array($client, $plat, $dessert));
        echo 'Commande prise en compte !';
        // $affiche = $bdd->query('SELECT * FROM commande');
        // $donnees = $affiche->fetchAll();
        // foreach($donnees as $row){
        //     echo $row['client'];
        //     echo $row['plat'];
        //     echo $row['dessert'];
        // }
    } else {
        echo 'Veuillez remplir tous les champs';
    }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 align="center">PRISE DE COMMANDE :</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" align="center">
        <input type="text" name="client" id="client" placeholder="nom du client"><br>
        <input type="text" name="plat" id="plat" placeholder="plat"><br>
        <input type="text" name="dessert" id="dessert" placeholder="dessert"><br>
        <input type="submit" name="submit">
    </form>
    <a href="affiche-commande.php">Voir les commandes</a>
</body>
</html>