<?php 
ob_start();
?>
<div class='alert alert-danger text-center'>Erreur 404</div>
<div class='alert alert-danger text-center'>Votre page n'a pas été trouvée ou n'existe peut-être pas</div>
<?php
$contenu = ob_get_clean();
require_once('template.php');