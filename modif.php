<?php
    require_once("assets/templates/header-inside.php");
	require_once("core/db.php");
    require_once("core/functions.php");

    $id = $_GET['id'];

    $art_mod = selectWithId('category', 'articles', 'id', $id, 'id', 'id_category');

    $cat = selectAll('category');
?>
    <section id="sect-add" class="cont-main">
        <span class="return-button"><a class="return" href="interface.php">Retour</a></span>
        <div>
            <form method="post" enctype="multipart/form-data" action="core/exec-update.php?id=<?php echo $id; ?>">
                <label>Insérer un fichier :</label>
                <div class="up-item">
                    <input type="file" name="link" value="<?php echo $art_mod->link; ?>" />
                </div>
                <label>Titre de l'article :</label>
                <div class="up-item">
                    <input type="text" name="title" value="<?php echo $art_mod->title; ?>" />
                </div>
                <label>Catégorie :</label>
                <div class="up-item">
                    <!--Manga <input type="radio" name="category" value="Manga" />
                    Jeux <input type="radio" name="category" value="Jeux" />
                    Comics <input type="radio" name="category" value="Comics" />
                    Animes <input type="radio" name="category" value="Anime" />-->
                    <?php
                        echo "$art_mod->libelle <input type=\"radio\" name=\"category\" value=\"$art_mod->id_category\" checked=\"checked\" />";
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