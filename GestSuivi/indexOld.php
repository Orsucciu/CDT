<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
ini_set('error_reporting', E_ALL);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
        //include '../apiAuthLDAP/index.php';
       
        $connexion = new PdoSuivicours();
        $info=$connexion->getInfosEtudiant("usaale04");
        print_r($info);
      
       
        ?>
    </body>
</html>
