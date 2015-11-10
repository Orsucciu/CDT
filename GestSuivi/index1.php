<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php require ("fonctions/PDOsuivi.PdoSuivicours.php");?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $connexion = new PDOsuivi::$getInfosEtudiant("usaale04");
        echo $connexion;
        ?>
    </body>
</html>
