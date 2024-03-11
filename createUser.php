<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: / ');
    exit;
}

if (isset($_GET['userId'])) {
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=ecvb2;charset=utf8',
        'root',
        'root'
    );
    $call = $mysqlClient->prepare(
        'SELECT * FROM users WHERE id = "' . $_GET['userId'] . '"'
    );
    $call->execute();
    $user = $call->fetchAll();
    if (count($user) > 0) {
        $login = $user[0]['login'];
        $update = true;
    }
}

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password =  $_POST['password'];
    $password2 =  $_POST['password2'];


    if ($password !== $password2) {
        $message = 'Les mots de passe ne correspondent pas';
    } else if (strlen($login) < 3) {
        $message = 'Le login ne contient pas assez de caractères';
    } else {
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=ecvb2;charset=utf8',
            'root',
            'root'
        );


        if (isset($_POST['userId'])) {
            $call = $mysqlClient->prepare("UPDATE  `users` set password = '" . $password . "' WHERE id = " . $_POST['userId']);
            $call->execute();
            $message = 'L\'utilisateur a été modifié';
        } else {
            $call = $mysqlClient->prepare("insert INTO `users` (`login`, `password`) VALUES ('" . $login ."', '" . $password . "')"
            );
            $call->execute();
            $message = 'L\'utilisateur a été créé';
        }
    }
}

include('views/header/header.php'); 
?>
    <h1>Créer un utilisateur</h1>
    <p>Renseignez les informations de l'utilisateur à créer</p>
    <?php if(isset($message)) {
        echo '<p style="color:red;"> ' . $message . ' </p>';
    } ?>
    <form method="post">
        <div>
            <label for="login">Login</label>
            <input
                type="text"
                id="login"
                name="login"
                <?php if (isset($update)) {
                    echo 'value=" ' . $login . ' "';
                } ?>
                
            >
        </div>
        <?php if (isset($update)) {
                    echo '<input type="hidden" name="userId" value="' . $_GET['userId'] . '">';
                } ?>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password2">Vérification du mot de passe</label>
            <input type="password" id="password2" name="password2">
        </div>
        <div>
            <input type="submit" value="Valider">
        </div>
    </form>
<?php include('views/footer/footer.php'); ?>