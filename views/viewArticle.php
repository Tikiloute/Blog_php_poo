<?php
ob_start();
if(isset($_GET["addComment"])){
  echo "<div class='alert alert-success text-center'>Votre commentaire a bien été envoyé</div>";
}
if(isset($_GET["report"])){
  echo "<div class='alert alert-warning text-center'>Votre signalement a bien été envoyé</div>";
}
?>
<a href='articles&page=1' class="btn btn-light text-dark mb-2 btnBlanc">Revenir à la liste d'articles</a>
  <div class="card text-left mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6">
    <div class="card-body shadow-lg">
      <h5 class="card-title"><?= $art['titre']  ?></h5>
      <hr class="hr">
      <p class="card-text"><?= $art['contenu']?></p>
      <hr class="hr">
<?php 
  if(isset($_SESSION['connected']) && $_SESSION['connected'] === true){
?>
      <a href="modify&id=<?= $_GET['id']?>" class="btn btn-success btnVert text-white shadow-sm mt-4 ">Modifier l'article</a>
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
      <input type="submit" class="btn btn-primary btnBleu" />
  </form>
  <br>
  <hr class="hr">
  <br>
  </div>
<?php
  if(isset($count[0]) && $count[0]>0 && $_GET['pagingComment']<$round && $_GET['pagingComment']>0){
?>
  <h3 class='intro'>Réagissez à cet article: </h3>
<?php 
  }
  for($i = 0; $i < $count[0]; $i++){
    if(isset($comments[$i]['identifiant'],$comments[$i]['commentaire'], $comments[$i]['date'], $comments[$i]['id']) ){
?>
  <div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-4">
    <div class="card-body shadow-lg text-center">
      <h5 class="card-title"><?= $comments[$i]['identifiant'] ?></h5>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'A dit : '.$comments[$i]['commentaire']?></p>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'Le '.$comments[$i]['date']?></p>
      <a href="index.php?action=report&amp;id=<?= $_GET['id'] ?>&amp;idComment=<?= $comments[$i]['id']?>&amp;pagingComment=<?= $_GET['pagingComment']?>&amp;identifiant=<?= $comments[$i]['identifiant']?>&amp;comment=<?= $comments[$i]['commentaire']?>&amp;date=<?= $comments[$i]['date']?>&amp;articleName=<?= $art['titre']?>&amp;NombreIdReport=<?= $comments[$i]['nombre_Id_Report']?>" class="btn btn-warning btnJaune mb-2-sm">Signaler ce commentaire</a>
      <?php
      /**
       * Si la variable de session "connected" alors le bouton de suppression des commentaires sera actif
       */
      if(isset($_SESSION['connected']) && $_SESSION['connected']= true){
?>
      <a href="index.php?action=deleteComment&amp;id=<?= $_GET['id'] ?>&amp;idComment=<?= $comments[$i]['id']?>&amp;pagingComment=<?= $_GET['pagingComment']?>" class="btn btn-danger btnRouge">Supprimer ce commentaire</a>  
    <?php
      }
    ?>
    </div>
  </div>
<?php 
    }// End if-----------------------------
  } // fin boucle for-----------------------------
?>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
      <?php
    if(isset($_GET['pagingComment']) && $_GET['pagingComment'] > 1 && $_GET['pagingComment']<= $round){
?>
        <a class="page-link" href="article&id=<?= $_GET['id']?>&pagingComment=<?=$_GET['pagingComment']-1?>" tabindex="-1"><b>Précédent</b></a>
<?php
  }
?>
      </li>
<?php 
  for($i=1; $i <=$round; $i++){
    if(isset($_GET['pagingComment']) && $_GET['pagingComment'] != $i){
?>
      <li class="page-item d-none d-sm-block d-xl-block d-lg-block "><a class="page-link" href="article&id=<?=$_GET['id']?>&pagingComment=<?=$i?>"><b><?= $i?></b></a></li>
<?php
    }elseif($round>1){
?>
        <li class="page-item d-none d-sm-block d-xl-block d-lg-block disabled"><a class="page-link" href="article&id=<?=$_GET['id']?>&pagingComment=<?=$i?>"><b><?= $i ?></b></a></li>
<?php 
    }
  }
      ?>
      <li class="page-item">
<?php
  if(isset($_GET['pagingComment']) && $_GET['pagingComment'] < $round && $round > 0){
?>
        <a class="page-link" href="article&id=<?= $_GET['id']?>&pagingComment=<?=$_GET['pagingComment']+1?>" tabindex="-1"><b>suivant</b></a>
<?php
  }else{
    $_GET['pagingComment'] = $round;
  }
?>
      </li>
    </ul>
    </nav>
<?php
  $contenu = ob_get_clean();
  require('template.php');
