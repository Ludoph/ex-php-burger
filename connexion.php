<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;chartset=utf8;', 'root','root');

if(isset($_POST['submit'])){
    if(!empty($_POST['username']) AND !empty($_POST['mdp'])){
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND mdp = ?');
        $recupUser->execute(array($username, $mdp));

        if($recupUser->rowCount() > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('location: client.php');

        } else {
            echo 'Username ou mot de passe incorrect !';
        }
    } else {
        echo 'Veuillez remplir tous les champs !';
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
    <title>connexion</title>
</head>
<body>
    <h1 class="title">Espace Connexion</h1>
    <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" autocomplete="off">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">
        <input type="submit" name="submit" class="submit">
    </form>
    <a href="home.html">Retour</a>
</body>
</html>

