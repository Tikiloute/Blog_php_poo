<?php
ob_start();
?>
<div class="card text-left mx-auto mb-3 col-6">
  <div class="card-body">
    <h5 class="card-title"><?= $art['titre']  ?></h5>
    <p class="card-text"><?= $art['contenu']?></p>
  </div>
</div>

<?php
$contenu = ob_get_clean();
require('template.php');