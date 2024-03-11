<?php
$mysqlClient = new PDO(
	'mysql:host=localhost;dbname=ecvb2;charset=utf8',
	'root',
	'root'
);
?>
<?php include('views/header/header.php'); ?>
<?php
    $postId = $_GET['id'];
    $call = $mysqlClient->prepare('SELECT * FROM posts WHERE id = ' . $postId);
    $call->execute();
    $post = $call->fetchAll();
    // var_dump($posts);
    for ($i = 0; $i < count($post); $i++) {
    ?>
    <h1><?php echo $post[$i]['title']; ?></h1>
    <div class="content">
        <?php echo $post[$i]['content']; ?>
    </div>
    <?php } ?>

    <section>
        <h2>Ces articles peuvent aussi vous intéresser</h2>
        <?php
        $call = $mysqlClient->prepare('SELECT * FROM posts WHERE id != ' . $postId);
        $call->execute();
        $posts = $call->fetchAll();
        // var_dump($posts);
        for ($i = 0; $i < count($posts); $i++) {
        ?>
            <article>
                <h2><?php echo $posts[$i]['title']; ?></h2>
                <p><?php echo $posts[$i]['chapo']; ?></p>
                <a href="/post.php?id=<?php echo $posts[$i]['id']; ?>">Voir l'article</a>
            </article>
        <?php
        }
        ?>
    </section>
<?php include('views/footer/footer.php'); ?>