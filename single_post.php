<?php
    include "db.php";
    include "header.php";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Vivify Blog</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
            integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <link href="styles/blog.css" rel="stylesheet">
        <link href="styles/styles.css" rel="stylesheet">
    </head>

    <body>
        <main role="main" class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    <div class="blog-post">
                        <?php
                            $dbManagement = new DbManagement();
                            $singlePost = $dbManagement->getPostById($_GET['post_id']);
                        ?>
                        <h2 class="blog-post-title">
                            <?php echo ($singlePost['Title']) ?>
                        </h2>

                        <p class="blog-post-meta">
                            <?php echo ($singlePost['Created_at']) ?> by
                            <?php echo ($singlePost['Author']) ?>
                        </p>
                        <p>
                            <?php echo ($singlePost['Body']) ?>
                        </p>
                        <hr>
                        <h4>
                            Comments: 
                        </h4>
                        <br>
                        <ul>
                            <?php $comments = $dbManagement->getCommentsByPostId($_GET['post_id']); ?>
                            <?php foreach ($comments as $comment) { ?>
                                <li>
                                    <h6><b><?php echo "$comment[Author]"; ?></b></h6>
                                    <h5><?php echo "$comment[Text]"; ?></h5>
                                </li>
                                <hr>
                            <?php } ?>
                        </ul>
                    </div>
                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                    </nav>
                </div>
                <?php include "sidebar.php"; ?>
            </div>
        </main>
    </body>
</html>