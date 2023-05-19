<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root','root');

if(isset($_POST['submit'])){
    if(!empty($_POST['username']) AND !empty($_POST['mdp']) AND !empty($_POST['checkmdp'] AND ($_POST['mdp'] == $_POST['checkmdp']))) {
        $username = $_POST['username'];
        $mdp = $_POST['mdp'];
        $insertUser = $bdd->prepare('INSERT INTO users(username,mdp) VALUES (?,?)');
        $insertUser->execute(array($username,$mdp));
    
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND mdp = ?');
        $recupUser->execute(array($username, $mdp));
        if($recupUser->rowCount() > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header ('location: client.php');
        }
        echo $_SESSION['username'];
    } elseif ($_POST['username'] AND $_POST['mdp'] AND $_POST['checkmdp'] AND ($_POST['mdp'] != $_POST['checkmdp'])){
        echo 'vos mdp ne sont pas identique !';
    }

} else {
    echo 'Veuillez remplir tous les champs !';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>inscription</title>
</head>
<body>
    <h1 class="title">Creation de compte</h1>

    <form action="" method="POST" align="center">
        <label for="username">username :</label>
        <input type="text" name="username">
        <label for="mdp">mot de passe :</label>
        <input type="password" name="mdp">
        <label for="checkmdp">verif mot de passe :</label>
        <input type="password" name="checkmdp">
        <input type="submit" name="submit">
    </form>

    <a href="home.html">Retour</a>
</body>
</html>