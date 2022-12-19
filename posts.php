<?php
include "db.php";
?>
<main role="main" class="container">
    <div class="row">
        <div class="col-sm-12 blog-main">
            <div class="blog-post">
                <?php
                    $dbManagement = new DbManagement();
                    $posts = $dbManagement->getAllPostsByDescOrder();
                ?>
                <?php foreach ($posts as $post) { ?>
                    <article class="blog-post">
                        <header>
                            <h1 class="blog-post-title">
                                <a href="single_post.php?post_id=<?php echo ($post['Id']) ?>">
                                    <?php echo ($post['Title']); ?>
                                </a>
                            </h1>
                            <div class="blog-post-meta">
                                <?php echo ($post['Created_at']); ?> by <?php echo ($post['Author']);?>
                            </div>
                        </header>
                        <div>
                            <p class="blog-post">
                                <?php echo ($post['Body']); ?>
                            </p>
                        </div>
                    </article>
                <?php } ?>
            </div>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
        </div>
    </div>
</main>