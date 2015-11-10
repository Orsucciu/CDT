<?php

function ajoutUser($connexion,$table, $login,$nom,$prenom,$mail){
    $req="INSERT INTO '".$table."' VALUES('".$login."','".$nom."','".$prenom."','".$mail."')";
    $connexion->prepare($req)->execute();
            
}
?>
