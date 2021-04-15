<?php
ob_start();
if(!empty($_POST['identifiant']) || !empty($_POST['password'])){
    if($_SESSION['identifiant'] != $adm["identifiant"] || password_verify($_SESSION['password'], $adm["password"]) === false){
?>
        <div class='alert alert-danger text-center'>Identifiant et / ou mot de passe erroné(s)!</div>
<?php
    }
}else {
?>
        <div class='alert alert-danger text-center'>Champs identifiant et / ou mot de passe vide(s)!</div>
<?php
}
?>
<h3>Espace connexion</h3>
<hr class="hr">
<form action="#" method="POST">
    <div class="col-12 mt-5">
        <div class="mb-3 col-3  mx-auto">
            <label for="exampleInputId"  class="form-label">Identifiant</label>
            <input type="text" name="identifiant" class="form-control" id="exampleInputId">
        </div>
        <div class="mb-3 col-3 mx-auto">
            <label for="exampleInputPassword1"  class="form-label">Mot de passe</label>
            <input type="password" name ="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-flex justify-content-center mt-4">
        <input type="submit" class="btn btn-primary"/>
        </div>
    </div>
</form>

<?php
$content = ob_get_clean();
require_once('template.php');
?>