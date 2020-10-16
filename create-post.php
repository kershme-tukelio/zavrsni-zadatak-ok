<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php'); ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-sm-8 blog-main">
                <form id="create-post" action="create-post.php" method="post">
                    <?php
                        if (isset($_POST['submit-button'])) {
                            try {
                                $sql = "INSERT INTO posts (title, body, author, created_at) VALUES ('{$_POST['title']}', '{$_POST['body']}', '{$_POST['author']}', NOW())";
                                $statement = $connection->prepare($sql);
                                $statement->execute();
                            }
                            catch (PDOException $e)
                            {
                                echo $e->getMessage();
                            }
                        }
                    ?>
                    <h3>Kreiraj post</h3><br/>
                    <span>Ime autora: </span><br/>
                    <input type="text" name="author"><br/>
                    <span>Naslov posta: </span><br/>
                    <input type="text" name="title"><br/>
                    <span>Sadrzaj posta: </span><br/>
                    <input type="text" name="body"><br/><br/>
                    <button id="submit-post" name="submit-button" type="submit"> Submit </button>

                </form>
            </div>
            
            <?php include_once('sidebar.php'); ?>
        </div>
    </main>

    <?php include_once('footer.php'); ?>

</body>
</html>