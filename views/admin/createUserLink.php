<?php
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=ecvb2;charset=utf8',
        'root',
        'root'
    );
    $call = $mysqlClient->prepare('SELECT * FROM users');
    $call->execute();
    $users = $call->fetchAll();
?>
<ul>
    <?php 
    for ($i = 0; $i < count($users); $i++) {
        echo '<li><a href="/createUser.php?userId=' . $users[$i]['id'] . '">' . $users[$i]['login'] . '</a></li>';
    } ?>
</ul>
<a href="/createUser.php">Créer un utilisateur</a>
<br/>