<?php
ob_start();
if(!empty($_POST['identifiant']) || !empty($_POST['password'])){
    if($_SESSION['identifiant'] != $adm["identifiant"] || password_verify($_SESSION['password'], $adm["password"]) === false){
?>
        <div class='alert alert-danger text-center'>Identifiant et / ou mot de passe erroné(s)!</div>
<?php
    }
}elseif(isset($_GET['empty'])&& $_GET['empty']==="ok") {
?>
        <div class='alert alert-danger text-center'>Champs identifiant et / ou mot de passe vide(s)!</div>
<?php
}
?>
<h3>Espace connexion</h3>
<hr class="hr">
<form action="admin&connected=ok" method="POST">
    <div class="col-12 mt-5">
        <div class="mb-3 col-sm-12 col-lg-6 col-xl-6  mx-auto">
            <label for="InputId"  class="form-label">Identifiant</label>
            <input type="text" name="identifiant" class="form-control" id="InputId" required>
        </div>
        <div class="mb-3 col-sm-12 col-lg-6 col-xl-6 mx-auto">
            <label for="InputPassword"  class="form-label">Mot de passe</label>
            <input type="password" name ="password" class="form-control" id="InputPassword" required>
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