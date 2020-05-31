<div class="container">
    <div class="cards-grid">
        <?php foreach ($data['posts'] as $post) : ?>
        <a href="<?php echo URLROOT; ?>/pages/blog/<?php echo $post -> id; ?>">
            <div class="card">
                <img src="<?php echo URLROOT ."/public/assets/img/" . $post -> image ?>" alt="Blogg image">
                <div class="card__body">
                    <h4 class="card__head"><?php echo $post -> title ?></h4>
                    <p class="card__content"><?php echo substr($post -> text, 0, 100)  ?></p>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>