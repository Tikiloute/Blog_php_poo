<?php 
ob_start();
for($i = 0; $i < $count[0]; $i++){
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $articles[$i]['titre'] ?></h5>
    <p class="card-text"><?= $articles[$i]['contenu']?></p>
    <a href="index.php?action=article&id=<?= $articles[$i]['id']?>" class="btn btn-primary">Aller sur l'article</a>
  </div>
</div>
    
<?php
}
$contenu = ob_get_clean();
require_once('template.php');
