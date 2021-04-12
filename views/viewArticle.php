<?php
ob_start();
?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $art['titre']  ?></h5>
    <p class="card-text"><?= $art['contenu']?></p>
  </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('template.php');
    