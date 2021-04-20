<?php
ob_start();
?>      
        <!-- Mise en place de tinyMce (script) -->
    <script>
        tinymce.init({
            selector: '#ModifyTextArea'
        });
    </script>
    <a href='article&id=<?= $_GET['id'] ?>&pagingComment=1' class="btn btn-light text-dark mb-2 btnBlanc">Revenir à l'article</a>
    <?php
    if(isset($_GET['success']) && $_GET['success'] === 'ok'){
    ?>
        <div class='alert alert-success text-center'>Article modifié avec succès !</div>
    <?php
    }elseif(isset($_GET['success']) && $_GET['success'] === 'notOk'){
    ?>
        <div class='alert alert-danger text-center'>Veuillez modifier l'article !</div>
    <?php
    }
    ?>
    <form action="update&id=<?= $_GET['id'] ?>" method="POST" class="card mx-auto col-sm-12 col-lg-6 col-xl-6" >
        <input type="hidden" name="idArticle" value="<?= $_GET['id'] ?>">
        <textarea placeholder="titre" name="titreArticle"><?= $art['titre'] ?></textarea>
        <textarea id="ModifyTextArea"  placeholder="contenu" style="height: 50vh" name="contenuArticle"><?= $art['contenu']?></textarea>
        <input type="submit" value="Modifier l'article" class="btn btn-primary btnBleu"/>
    </form>

                        <!-- bouton de la modal -->
    <button type="button" class="btn btn-danger mt-3 btnRouge" id='myInput' data-bs-toggle="modal" data-bs-target="#myModal">Supprimer l'article</button>

                         <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Confirmation de la suppression de l'article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Etes-vous sûr de vouloir supprimer cet article ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <!-- bouton suppression de l'article -->
            <a href="deleteArticle&id=<?= $_GET['id']?>" type="button" class="btn btn-danger">Supprimer l'article</a>
        </div>
        </div>
    </div>
    </div>
    
<?php 
$contenu = ob_get_clean();
require('template.php');
?>