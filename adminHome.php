<?php
session_start();
if (isset($_POST['login']) &&  isset($_POST['password'])) {
    /*
        Faire la vérification du login + password dans la bdd
    */
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=ecvb2;charset=utf8',
        'root',
        'root'
    );
    $call = $mysqlClient->prepare(
        'SELECT * FROM users WHERE login = "' . $_POST['login'] . '" AND password = "' . $_POST['password'].'"'
    );
    $call->execute();
    $user = $call->fetchAll();
    if (count($user) > 0) {
        $_SESSION['id'] = $user[0]['id']; // exemple
    } else {
        $error = true;
    }    
} else if (isset($_GET['session']) &&  $_GET['session'] === 'destroy') {
    session_destroy();
    header('Location: adminHome.php');
    exit();
}
?>
<?php include('views/header/header.php'); 
?>
    <h1>Admin</h1>
    <?php if (isset($_SESSION['id'])) {
            include('views/admin/posts.php'); 
            include('views/admin/createUserLink.php');
            include('views/admin/disconnectLink.php'); 
        } else {
            include('views/admin/loginForm.php'); 
        } 
     ?>
<?php include('views/footer/footer.php'); ?>