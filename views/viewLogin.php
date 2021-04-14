<?php 
if(isset($_POST['identifiant']) && isset($_POST['password'])){

    $username = $_POST['identifiant'];
    $password = $_POST['password'];
    $_SESSION['identifiant'] = $username;
    $_SESSION['password'] = $password;
    

}