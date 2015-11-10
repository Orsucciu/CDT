<?php
/**
 * Created by PhpStorm.
 * User: cecile
 * Date: 13/10/2015
 */

require_once 'fonctions.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

//if(isset($_POST['login']) && isset($_POST['mdp'])){
//    $login = $_POST['login'];
//    $mdp = $_POST['mdp'];
//    auth($login, $mdp);
//}

//test avec un prof
$infos = auth("proqui01", "19800101");

//test avec un eleve
//$infos = auth("bienor01", "19800101");

echo "Bienvenue ". $infos["nom_prenom"]." (".$infos["statut"].")";
echo "<br />";

if($infos["statut"] == "Enseignant"){
    echo "Classe(s) :";
    echo "<br />";
    for($i=1;$i<=count($infos["classe"]);$i++){
        echo $infos["classe"][$i];
        echo "<br />";
    }
}
elseif($infos["statut"] == "Etudiant"){
    echo "Classe :".$infos["classe"];
    echo "<br />";
}

echo "<br />";
echo "Votre login est : ".$infos["login"];
echo "<br />";
echo "Votre mél est : ".$infos["login"]."@llb.fr";
echo "<br />";