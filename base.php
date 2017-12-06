<?php
    require_once("assets/templates/header-inside.php");
	require_once("core/db.php");
    require_once("core/functions.php");

    $articles = selectAllJoin('category', 'articles', 'id', 'id_category');
?>
    <section class="cont-main">
        <span class="return-button"><a class="button" href="interface.php">Retour</a></span>
        <div>
            <table>
                <tr>
                    <th>Identifiant</th>
                    <th>Titre</th>
                    <th>Lien</th>
                    <th>Catégorie</th>
                    <th>Opérations</th>
                </tr>
                    <?php
                        
                        foreach($articles as $a){
                            $chemin = 'articles/' . $a->link;
                            echo "<tr>
                                    <td>$a->id</td>
                                    <td>$a->title</td>
                                    <td>$a->link</td>
                                    <td>$a->libelle</td>
                                    <td><a href=\"$chemin\">Télécharger</a> / <a href=\"modif.php?id=$a->id\">Modifier</a> / <a href=\"core/exec-delete.php?id=$a->id\">Supprimer</a></td>
                                </tr>";
                        }
                    ?>
            </table>
        </div>
    </section>
<?php
	require_once("assets/templates/footer-inside.php");
?>