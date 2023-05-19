<?php 
$bdd = new PDO('mysql:host=localhost;dbname=<test>commande', 'root','root');
if(isset($_POST['submit'])){
    echo $_POST['client'];
    echo $_POST['plat'];
    echo $_POST['dessert'];
}




?>