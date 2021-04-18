<?php 
ob_start();
for($i = 0; $i < $count[0]; $i++){
  if(isset($articles[$i]['titre'],$articles[$i]['contenu'], $articles[$i]['id'])){
?>
<div class="card mx-auto mb-3 col-sm-12 col-lg-6 col-xl-6 col-xl-6">
  <div class="card-body shadow-lg text-center">
    <h5 class="card-title"><?= $articles[$i]['titre'] ?></h5>
    <hr class="hr">
    <p class="card-text"><?= $articles[$i]['contenu'].'...'?></p>
    <hr class="hr">
    <a href="article&id=<?= $articles[$i]['id']?>&pagingComment=1" class="btn btn-primary mt-4">Aller sur l'article</a>
  </div>
</div>
<br>
<hr class="hr">
<br>    
<?php
  }
}
?>
<nav aria-label="...">
  <ul class="pagination justify-content-center">
    <li class="page-item">
    <?php
      if($_GET['page'] > 1){
    ?>
      <a class="page-link" href="articles&page=<?=$_GET['page']-1?>" tabindex="-1"><b>Précédent</b></a>
    <?php
      }
    ?>
    </li>
<?php 
      for($i = 1; $i <= $round ; $i++){
        if($_GET['page'] != $i){
?>
    <li class="page-item d-none d-xl-block d-lg-block"><a class="page-link" href="articles&page=<?=$i?>"><b><?= $i ?></b></a></li>
<?php
        }else{
?>
    <li class="page-item d-none d-xl-block d-lg-block disabled"><a class="page-link" href="articles&page=<?=$i?>"><b><?= $i ?></b></a></li>
<?php
        }
      }
?>    
    <li class="page-item">
    <?php
    if($_GET['page'] < $round){
    ?>
      <a class="page-link" href="articles&page=<?=$_GET['page']+1?>"><b>Suivant</b></a>
    <?php
    }
    ?>
    </li>
  </ul>
</nav>
<br>
<br>
<?php
$contenu = ob_get_clean();
require('template.php');

