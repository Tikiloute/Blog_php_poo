<?php
ob_start();
?>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
        <h2 class="write-article">Bonjour</h2>
        <h3 class="write-article">Créer votre article ici</h3>
        <form action="#" method="POST" class="card" style="width: 20rem;">
            <input type="text" placeholder="Titre" name="titre" class="card-title"/>
            <textarea id="mytextarea" placeholder="Contenu" name="contenu"></textarea>
            <input type="submit" class="btn btn-primary" />
        </form>
<?php
$contenu = ob_get_clean();
require_once('template.php');

