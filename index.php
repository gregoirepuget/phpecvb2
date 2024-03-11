<?php
$mysqlClient = new PDO(
	'mysql:host=localhost;dbname=ecvb2;charset=utf8',
	'root',
	'root'
);
?>
<?php include('views/header/header.php'); ?>
    <h1>Accueil</h1>
    <?php
    $call = $mysqlClient->prepare('SELECT * FROM posts');
    $call->execute();
    $posts = $call->fetchAll();
    // var_dump($posts);
    for ($i = 0; $i < count($posts); $i++) {
    ?>
        <article>
            <h2><?php echo $posts[$i]['title']; ?></h2>
            <p><?php echo $posts[$i]['chapo']; ?></p>
            <a href="/post.php?id=<?php echo $posts[$i]['id']; ?>">Lire la suite</a>
        </article>
    <?php
    }
?>
<?php include('views/footer/footer.php'); ?>