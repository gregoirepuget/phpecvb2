<?php
session_start();
if (isset($_POST['login']) &&  isset($_POST['password'])) {
    /*
        Faire la vérification du login + password dans la bdd
    */
    $_SESSION['id'] = 1; // exemple
} else if (isset($_GET['session']) &&  $_GET['session'] === 'destroy') {
    session_destroy();
}
?>
<?php include('views/header/header.php'); ?>
    <h1>Admin</h1>
    <?php if (isset($_SESSION['id'])) {
            include('views/admin/posts.php'); 
        } else {
            include('views/admin/loginForm.php'); 
        } 
     ?>
<?php include('views/footer/footer.php'); ?>