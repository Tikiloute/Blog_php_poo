<?php
ob_start();
if(isset($_GET["addComment"])){
  echo "<div class='alert alert-success text-center'>Votre commentaire a bien été envoyé</div>";
}
if(isset($_GET["report"])){
  echo "<div class='alert alert-success text-center'>Votre signalement a bien été envoyé</div>";
}
?>

  <div class="card text-left mx-auto mb-3 col-6">
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
  <form action="#" method="POST" class="card mx-auto col-6 shadow-lg">
      <input type="text" placeholder="Pseudo" name="pseudo" class="card-title"/>
      <textarea id="mytextarea" placeholder="Contenu" name="content"></textarea>
      <input type="submit" class="btn btn-primary" />
  </form>
  <br>
  <hr class="hr">
  <br>
  </div>

<?php
  if($count[0]>0){
?>

  <h3 class='intro'>Réagissez à cet article: </h3>

<?php 
  }
  for($i = 0; $i < $count[0]; $i++){
?>

  <div class="card mx-auto mb-3 col-6">
    <div class="card-body shadow-lg text-center">
      <h5 class="card-title"><?= $comments[$i]['identifiant'] ?></h5>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'A dit : '.$comments[$i]['commentaire']?></p>
      <hr class="hr">
      <p class="card-text mt-2"><?= 'Le '.$comments[$i]['date']?></p>
      <a href="index.php?action=report&id=<?= $_GET['id'] ?>&amp;idComment=<?= $comments[$i]['id']?>&amp;identifiant=<?= $comments[$i]['identifiant']?>&amp;comment=<?= $comments[$i]['commentaire']?>&amp;date=<?= $comments[$i]['date']?>&amp;articleName=<?= $art['titre']?>" class="btn btn-danger">Signaler ce commentaire</a>
    </div>
  </div>

<?php
  }
  $contenu = ob_get_clean();
  require('template.php');