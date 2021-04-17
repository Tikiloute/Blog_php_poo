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
            <h3 class="write-article intro">Modération des commentaires</h3>
            <br>
<?php
        foreach($reportComment as $reportComments){
                $isInArray = in_array($reportComments['idCommentaire'],$arrayIdComment);//bool : indique si la valeur appartient au tableau
                $idComment =  intval($reportComments['idCommentaire']);
                array_push($arrayIdComment,$idComment);
                if($isInArray===false){

?>
            <div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
            <div class="card-body shadow-lg text-center">
                <h5 class="card-title"><?= $reportComments['identifiant'] ?></h5>
                <hr class="hr">
                <p class="card-text mt-2"><?= 'A écrit: "'.$reportComments['commentaire'].'"'?></p>
                <hr class="hr">
                <p class="card-text mt-2"><?= "Le ".$reportComments['date']?></p>
                <hr class="hr">
                <p class="card-text mt-2">Concernant l'article: <a href="article&id=<?= $reportComments['idArticle']?>" class="text-primary"><?= $reportComments['nomArticle'] ?></a></p>
                <?php
                $numberIdComment = array_count_values($arrayIdComment);
                //print_r($arrayIdComment);
                if( $reportComments['nombre_Id_Report'] > 1){
                ?>
                <hr class="hr">
                <p class="card-text mt-2 mb-4">Nombre de signalement : <span class="badge bg-danger"><?= $reportComments['nombre_Id_Report']." fois" ?></span></p>
                <?php
                }
                ?>
                <a href="validateReportComment&id=<?= $reportComments['idCommentaire'] ?>" class="btn btn-success">Valider le commentaire</a>
                <a href="deleteReportComment&id=<?= $reportComments['idCommentaire']?>" class="btn btn-danger">Supprimer le commentaire</a>
            </div>
            </div>
            <br>
            <hr class="hr">
            <br> 
<?php 
            }
        }
$contenu = ob_get_clean();
require_once('template.php');