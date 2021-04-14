<?php
if($count[0]>0){
?>
<h3>Réagissez à cet article: </h3>
<?php 
}
for($i = 0; $i < $count[0]; $i++){
?>
<div class="card mx-auto mb-3 col-6">
  <div class="card-body  text-center">
    <h5 class="card-title"><?= $comments[$i]['identifiant'] ?></h5>
    <p class="card-text"><?= $comments[$i]['commentaire']?></p>
    <p class="card-text"><?= $comments[$i]['date']?></p>
    <a href="#" class="btn btn-danger">Signaler ce commentaire</a>
  </div>
</div>
    
<?php
}
