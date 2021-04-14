<?php
ob_start(); 
?>
<h3 class="intro">Derniers articles publiés</h3>
<?php
for($i = 0; $i < 3; $i++){
?>
<div class="card text-center mx-auto mb-3 col-6" >
  <div class="card-body shadow-lg">
    <h5 class="card-title"><?= $articles[$i]['titre']  ?></h5>
    <p class="card-text"><?= $articles[$i]['contenu'].' ...'?></p>
    <a href="index.php?action=article&id=<?= $articles[$i]['id']?>" class="btn btn-primary">Aller sur l'article</a>
  </div>
</div>
    
<?php
}
$content = ob_get_clean();
