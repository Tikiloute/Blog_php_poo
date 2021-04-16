<?php
ob_start();
if(!empty($_GET['connected']) && $_GET['connected']==="ok"){
?>
    <div class='alert alert-success text-center'>Vous êtes connecté</div>
<?php
}
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
            <form action="#" method="POST" class="card mx-auto col-sm-12 col-lg-6 col-xl-6">
                <input type="text" placeholder="Titre" name="titre" class="card-title"/>
                <textarea id="mytextarea" placeholder="Contenu" name="contenu"></textarea>
                <input type="submit" class="btn btn-primary" />
            </form>
        </div>
            <br>
        <hr class="hr">
            <br>
            <h3 class="write-article intro">Modération des articles</h3>
            <br>
<?php
        for($i = 0; $i < $countReadReport; $i++){
           $administratorController = new \Controllers\AdministratorController();
           $countComment = $administratorController->report->sum($readReport[$i]['idCommentaire']);
?>
            <div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
            <div class="card-body shadow-lg text-center">
                <h5 class="card-title"><?= $readReport[$i]['identifiant'] ?></h5>
                <hr class="hr">
                <p class="card-text mt-2"><?= 'A écrit: "'.$readReport[$i]['commentaire'].'"'?></p>
                <hr class="hr">
                <p class="card-text mt-2"><?= "Le ".$readReport[$i]['date']?></p>
                <hr class="hr">
                <p class="card-text mt-2">Concernant l'article: <a href="article&id=<?= $readReport[$i]['idArticle']?>" class="text-primary"><?= $readReport[$i]['nomArticle'] ?></a></p>
                <hr class="hr">
                <?php
                //ici on dit que si la variable $reported est supérieure à 1 on crée une ligne supplémentaire avec le nombre de signalement
                if( $countComment[0] > 1){
                ?>
                <p class="card-text mt-2 mb-4">Nombre de signalement <span class="badge bg-danger"><?= $countComment[0] ?></span></p>
                <?php
                }
                ?>
                <a href="validateReportComment&id=<?= $readReport[$i]['id']?>" class="btn btn-success">Valider le commentaire</a>
                <a href="deleteReportComment&id=<?= $readReport[$i]['idCommentaire']?>" class="btn btn-danger">Supprimer le commentaire</a>
            </div>
            </div>
            <br>
            <hr class="hr">
            <br> 
<?php 
        }
$contenu = ob_get_clean();
require_once('template.php');