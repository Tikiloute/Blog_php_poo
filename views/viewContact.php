<?php
ob_start();
if(isset($_GET["email"]) && $_GET["email"]==="sent"){
?>
<div class='alert alert-success text-center'>Votre email a bien été envoyé</div>
<?php
}
?>
<form class="col-sm-12 col-lg-8 mx-auto " method="POST" action="contact&amp;email=sent">
  <div class="form-group  mb-3">
    <label for="email">Votre addresse Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="email@nom.com" required>
  </div>
  <div class="form-group  mb-3">
    <label for="subject">Sujet de votre message</label>
    <input type="text" placeholder="Nom" id='subject' name="subject" class="form-control" required/>
  </div>
  <div class="form-group  mb-3">
    <label for="textarea">Votre message</label>
    <textarea class="form-control  mb-3" placeholder="Votre message ici" name="emailContent" id="textarea" rows="15" required></textarea>
  </div>
  <input type="submit" class="btn btn-primary btnBleu mt-3" />
</form>
<?php

$content = ob_get_clean();
require_once('template.php');
?>