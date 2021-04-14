<?php
ob_start();
?>
        <script>
            tinymce.init({
                selector: '#mytextarea',
            });
        </script>
        <div >
            <h2 class="write-article intro">Bonjour <?= $_SESSION['identifiant']?></h2>
            <br>
            <hr class="hr">
            <br>
            <h3 class="write-article intro">Créer votre article ici</h3>
            <br>
            <form action="#" method="POST" class="card mx-auto col-6">
                <input type="text" placeholder="Titre" name="titre" class="card-title"/>
                <textarea id="mytextarea" placeholder="Contenu" name="contenu"></textarea>
                <input type="submit" class="btn btn-primary" />
            </form>
        </div>
            <br>
        <hr class="hr">
            <br>
<?php
$contenu = ob_get_clean();
require_once('template.php');

