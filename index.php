<?php
	require_once("assets/templates/header.php");
	require_once("core/db.php");
?>
	<section id="index-cloud">
		<header class="titre-co">
			<h2>Accès Xcloud | Authentification</h2>
        </header>
		<form method="post" action="core/login.php" class="form-cloud">
                <div class="item-cloud">
                    <input type="text" name="login" required="required" size="40" placeholder="Identifiant" />
                </div>
                <div class="item-cloud">
                    <input type="password" name="pass" required="required" size="40" placeholder="Mot de passe" />
                </div>
                <div class="item-cloud">
                    <button type="submit">
                        Connexion
                    </button>
                </div>
                <?php
                    $_GET['error'] = null;
                    if($_GET['error'] == 1){
                        echo "<p style=\"color : red\">L'identifiant ou le mot de passe est incorrect !</p>";
                    }
                    else{
                        echo "";
                    }
                ?>
            </form>
	</section>
<?php
	require_once("assets/templates/footer.php");
?>