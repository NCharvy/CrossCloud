<?php
    require_once("assets/templates/header-inside.php");
	require_once("core/db.php");
    require_once("core/functions.php");

    $cat = selectAll('category');
?>
    <section id="sect-add" class="cont-main">
        <span class="return-button"><a class="return" href="interface.php">Retour</a></span>
        <div>
            <form method="post" enctype="multipart/form-data" action="core/exec-upload.php">
                <label>Insérer un fichier :</label>
                <div class="up-item">
                    <input type="file" name="link" />
                </div>
                <label>Titre de l'article :</label>
                <div class="up-item">
                    <input type="text" name="title" />
                </div>
                <label>Catégorie :</label>
                <div class="up-item">
                    <!--Manga <input type="radio" name="category" value="Manga" />
                    Jeux <input type="radio" name="category" value="Jeux" />
                    Comics <input type="radio" name="category" value="Comics" />
                    Animes <input type="radio" name="category" value="Anime" />-->
                    <?php
                        foreach($cat as $c){
                            echo "$c->libelle <input type=\"radio\" name=\"category\" value=\"$c->id\" />";
                        }
                    ?>
                </div>
                <button>
                    Uploader
                </button>
            </form>
        </div>
    </section>

<?php
	require_once("assets/templates/footer-inside.php");
?>