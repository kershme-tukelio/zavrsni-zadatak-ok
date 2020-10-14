<?php        
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $statement->fetchAll();
?>

<?php
    foreach ($posts as $post) {
?>
    <article class="va-c-article">
        <header>
            <h1><a href="single-post.php?id=<?php echo($post['id']); ?>"><?php echo($post['title']); ?></a></h1>

                <div class="va-c-article__meta"> <?php echo($post['created_at']); ?> by <?php echo($post['author']); ?></div>
        </header>

            <div>
                <p> <?php echo($post['body']); ?></p>
            </div>
    </article>
<?php
    }
?>