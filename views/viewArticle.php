<?php
ob_start();
if(isset($_GET["addComment"])){
  echo "<div class='alert alert-success text-center'>Votre commentaire a bien été envoyé</div>";
}
if(isset($_GET["report"])){
  echo "<div class='alert alert-warning text-center'>Votre signalement a bien été envoyé</div>";
}
//if $art === null alors : article introuvable + vue 404 finir par die()
?>
<a href='articles&page=1' class="btn btn-light text-primary mb-2">Revenir à la liste d'articles</a>
  <div class="card text-left mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
    <div class="card-body shadow-lg">
      <h5 class="card-title"><?= $art['titre']  ?></h5>
      <hr class="hr">
      <p class="card-text"><?= $art['contenu']?></p>
      <hr class="hr">
<?php 
  if(isset($_SESSION['connected']) && $_SESSION['connected'] === true){
?>
      <a href="modify&id=<?= $_GET['id']?>" class="btn btn-success shadow-sm mt-4">Modifier l'article</a>
<?php 
  }
?>
    </div>
  </div>
  <br>
  <hr class="hr">
  <br>
  <div>
  <h3 class="write-article intro">Ecrivez votre commentaire ici</h3>
  <form action="#" method="POST" class="card mx-auto col-sm-12 col-lg-6 col-xl-6 shadow-lg">
      <input type="text" placeholder="Pseudo" name="pseudo" class="card-title"/>
      <textarea id="mytextarea" placeholder="Contenu" name="content"></textarea>
      <input type="submit" class="btn btn-primary" />
  </form>
  <br>
  <hr class="hr">
  <br>
  </div>

<?php
  if(isset($count[0]) && $count[0]>0){ //isset count[0]
?>

  <h3 class='intro'>Réagissez à cet article: </h3>

<?php 
  }

  for($i = 0; $i < $count[0]; $i++){
?>

  <div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
    <div class="card-body shadow-lg text-center">
      <h5 class="card-title"><?= $comments[$i]['identifiant'] ?></h5>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'A dit : '.$comments[$i]['commentaire']?></p>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'Le '.$comments[$i]['date']?></p>
      <a href="index.php?action=report&id=<?= $_GET['id'] ?>&amp;idComment=<?= $comments[$i]['id']?>&amp;identifiant=<?= $comments[$i]['identifiant']?>&amp;comment=<?= $comments[$i]['commentaire']?>&amp;date=<?= $comments[$i]['date']?>&amp;articleName=<?= $art['titre']?>&amp;NombreIdReport=<?= $comments[$i]['nombre_Id_Report']?>" class="btn btn-warning">Signaler ce commentaire</a>
      <?php
      if(isset($_SESSION['connected']) &&  $_SESSION['connected']= true){
      ?>

      <!------------------------------------------------ bouton de la modal------------------------------------------------>

      <button type="button" class="btn btn-danger" id='myInput' data-bs-toggle="modal" data-bs-target="#myModalComment">Supprimer le commentaire</button>
      <?php
      }
      ?>
    </div>
  </div>

      <!-------------------------------------------------- modal----------------------------------------------------------->

  <div class="modal fade" id="myModalComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression du commentaire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p>Etes-vous sûr de vouloir supprimer le commentaire de "<?= $comments[$i]['identifiant']?>" qui dit : " <?= $comments[$i]['commentaire']?>" ?</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

      <!------------------------------------------ bouton suppression du commentaire --------------------------------------->

          <a href="deleteComment&id=<?= $_GET['id']?>&idComment=<?= $comments[$i]['id']?>" class="btn btn-danger">Supprimer le commentaire</a>
      </div>
      </div>
  </div>
  </div>

<?php
  }
  $contenu = ob_get_clean();
  require('template.php');
