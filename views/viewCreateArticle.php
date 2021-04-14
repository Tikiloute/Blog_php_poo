<?php
ob_start();
?>
        <script>
            tinymce.init({
                selector: '#mytextarea',
            });
        </script>
        <div >
            <h2 class="write-article">Bonjour <?= $_SESSION['identifiant']?></h2>
            <h3 class="write-article">Créer votre article ici</h3>
            <form action="#" method="POST" class="card mx-auto col-6">
                <input type="text" placeholder="Titre" name="titre" class="card-title"/>
                <textarea id="mytextarea" placeholder="Contenu" name="contenu"></textarea>
                <input type="submit" class="btn btn-primary" />
            </form>
        </div>
<?php
$contenu = ob_get_clean();
require_once('template.php');

