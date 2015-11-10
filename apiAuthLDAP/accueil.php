<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="./">LLB</a>

            <ul>
                <li><a href="deconnect.php">D&eacute;connexion</a></li>
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>LLB</h1>
            <h2>Bienvenue <?php echo $_SESSION["statut"].' '.$_SESSION["nompre"] ?> sur la page d'accueil du LLB</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead"> <?php echo "Utilisateur : ".$_SESSION["user"];
                    if($_SESSION["statut"] == "Enseignant"){
    echo "<br />";
    echo "Classe(s) :";
    echo "<br />";
    for($i=1;$i<=count($_SESSION["classe"]);$i++){
        
        echo $_SESSION["classe"][$i];
        echo "<br />";
    }
}
elseif($_SESSION["statut"] == "Etudiant"){
    echo "<br />";
    echo "Classe :".$_SESSION["classe"];
    echo "<br />";
}?></br> Votre adresse mail est : <?php echo $_SESSION["user"]."@llb.fr"?></h2>
        </div>
        
    </div>
</div>

