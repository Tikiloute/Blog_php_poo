<?php
ob_start();
if(!empty($_GET['connected']) && $_GET['connected']==="ok"){
?>
    <div class='alert alert-success text-center'>Vous êtes connecté</div>
<?php
}
?>
        <div >
            <?php 
            if (!empty($_POST['titre']) && !empty($_POST['contenu']) && isset($_GET['send'])){
            ?>
            <div class='alert alert-success text-center'>Votre article a bien été envoyé</div>
            <?php 
            }
            ?>
            <h2 class="write-article intro">Bonjour <?= $_SESSION['identifiant']?></h2>
            <script>
            tinymce.init({
                selector: '#textarea'
            });
            </script>
            <br>
            <hr class="hr">
            <h3 class="write-article intro">Créer votre article ici</h3>
            <hr class="hr">
            <br>
            <form action="admin&send" method="POST" class="card mx-auto col-sm-12 col-lg-8 col-xl-8">
                <input type="text" placeholder="Titre" name="titre" class="card-title"/>
                <textarea id="textarea" placeholder="Contenu" name="contenu"></textarea>
                <input type="submit" class="btn btn-primary btnBleu" />
            </form>
        </div>
            <br>
            <hr class="hr">
            <h3 class="write-article intro">Votre liste d'article</h3>
            <hr class="hr">
            <br>
            <select class="form-select w-auto mx-auto" aria-label="select" onChange="window.location.href=this.value">
                <option selected class="">Choisissez l'article sur lequel vous souhaitez aller</option>
            <?php 
                foreach($article as $articles){
            ?>
                <option value="modify&id=<?= $articles['id']?>" class="mx-auto w-auto"><?=$articles['titre'] ?></option>
            <?php
            } 
            ?>
            </select>
            <br>
            <br>
            <?php
            if($count[0]>0){
            ?>
            <hr class="hr">
            <h3 class="write-article intro">Modération des commentaires</h3>
            <hr class="hr">
            <br>
            <?php
            }
            ?>
<?php
        foreach($reportComment as $reportComments){
?>
            <div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
            <div class="card-body shadow-lg text-center">
                <h5 class="card-title"><?= $reportComments['identifiant'] ?></h5>
                <hr class="hr">
                <p class="card-text mt-2"><?= 'A écrit: "'.$reportComments['commentaire'].'"'?></p>
                <hr class="hr">
                <p class="card-text mt-2"><?= "Le ".$reportComments['date']?></p>
                <hr class="hr">
                <p class="card-text mt-2">Concernant l'article: <a href="article&amp;id=<?= $reportComments['idArticle']?>&amp;pagingComment=1" class="text-primary"><?= $reportComments['nomArticle'] ?></a></p>
                <?php
                if( $reportComments['nombre_Id_Report'] > 1){
                ?>
                <hr class="hr">
                <p class="card-text mt-2 mb-4">Nombre de signalements : <span class="badge bg-danger"><?= $reportComments['nombre_Id_Report'] ?></span></p>
                <?php
                }
                ?>
                <a href="validateReportComment&id=<?= $reportComments['idCommentaire'] ?>" class="btn btn-success btnVert">Valider le commentaire</a>
                <a href="deleteReportComment&id=<?= $reportComments['idCommentaire']?>" class="btn btn-danger btnRouge ">Supprimer le commentaire</a>
            </div>
            </div>
            <br>
            <hr class="hr">
            <br> 
<?php 
        }
$contenu = ob_get_clean();
require_once('template.php');