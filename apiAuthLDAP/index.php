<?php
    ini_set('error_reporting', E_ALL);
    session_start();
    require_once 'fonctions2.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Lyc&eacute;e Laetitia Bonaparte</title>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/side-menu-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/side-menu.css">
    <!--<![endif]--> 

</head>

<body>
<?php

$message = "";

    if(filter_input(INPUT_POST,"bt_connect") == 1){
        $user = filter_input(INPUT_POST,"user");
        $password = filter_input(INPUT_POST,"password");
        $res=auth($user,$password);
        
        if($res["erreur"]!= "erreur"){
            $_SESSION["user"] = $res["login"];
            $_SESSION["nompre"] = $res["nom_prenom"];
            $_SESSION["classe"] = $res["classe"];
            $_SESSION["statut"] = $res["statut"];
        }
        else{
            $message = "Erreur d'authentification";
        }
    }

    if(isset($_SESSION["user"])){
        include "accueil.php";
    }
    else{
        include "login.php";
    }
    
?>
<script src="js/ui.js"></script>


</body>
</html>
