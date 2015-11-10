<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="./">LLB</a>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>LLB</h1>
            <h2>Formulaire d'authentification</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead"><mark><?php echo $message; ?></mark></h2>
            <form class="pure-form" name="auth" action="index.php" method="POST">
                <fieldset>
                    <legend>Veuillez saisir votre identifiant et mot de passe</legend>
                  
                    <input type="text" name="user" placeholder="identifiant">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <button type="submit" class="pure-button pure-button-primary" value=1 name="bt_connect">Valider</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>
