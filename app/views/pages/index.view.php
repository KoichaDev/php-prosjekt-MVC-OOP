<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>

<div class="grid-container">
  <main class="main">
    <h1 class="container__h1"><?php echo $data['title_blog'] ?></h1>
    <?php require_once APPROOT . '/views/includes/posts.inc.php'; ?>
  </main>
   <aside class="aside">
       <h1><?php echo $data['title_recent_news']; ?></h1>
    <?php require_once APPROOT . '/views/includes/widgets/news_feed.widget.php'; ?>    
  </aside>
</div>

<!-- <ul>
    <?php foreach ($data['posts'] as $post) { ?>
        <li><?php echo $post -> title?></li>
    <?php } ?>
</ul> -->

<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
