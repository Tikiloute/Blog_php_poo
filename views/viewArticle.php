<?php
ob_start();
?>
<div class="card text-left mx-auto mb-3 col-6">
  <div class="card-body shadow-lg">
    <h5 class="card-title"><?= $art['titre']  ?></h5>
    <p class="card-text"><?= $art['contenu']?></p>
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
<p class="card-text"><?= $comments[$i]['commentaire']?></p>
<p class="card-text"><?= $comments[$i]['date']?></p>
<a href="index.php?action=delete&id=<?= $_GET['id'] ?>&idComment=<?= $comments[$i]['id']?>&comment=<?= $comments[$i]['commentaire']?>&date=<?= $comments[$i]['date']?>&articleName=<?= $art['titre']?>" class="btn btn-danger">Signaler ce commentaire</a>
</div>
</div>

<?php
}
$contenu = ob_get_clean();
require('template.php');