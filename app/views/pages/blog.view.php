<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>
    <main class="blog-container">
        
        <div class="blog-container__blog-post">
        <h1 class="blog-container__blog-title"><?php echo $data['post'] -> title; ?></h1>
        <h2 class="blog-container__date">Posted <?php echo $data['post'] -> published_at; ?></h2>
        <p class="blog-container__blog-content"><?php echo $data['post'] -> text; ?></p>

        <?php require_once APPROOT . '/views/includes/blog_comments.inc.php'; ?>
        <?php require_once APPROOT . '/views/includes/blog_model_report.inc.php'; ?>

    </main>
<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
