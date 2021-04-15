<?php 
ob_start();
for($i = 0; $i < $count[0]; $i++){
?>
<div class="card mx-auto mb-3 col-6">
  <div class="card-body shadow-lg text-center">
    <h5 class="card-title"><?= $articles[$i]['titre'] ?></h5>
    <hr class="hr">
    <p class="card-text"><?= $articles[$i]['contenu'].'...'?></p>
    <a href="article&id=<?= $articles[$i]['id']?>" class="btn btn-primary">Aller sur l'article</a>
  </div>
</div>
<br>
<hr class="hr">
<br>    
<?php
}
?>
<br>
<br>
<?php
$contenu = ob_get_clean();
require('template.php');

