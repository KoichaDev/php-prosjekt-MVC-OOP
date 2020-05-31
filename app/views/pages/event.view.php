<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>
 <main>
    <h1 class="container__h1"><?php echo $data['event_title'] ?></h1>
    <ul class="event-cards">
        <?php foreach($data['posts'] as $post) : ?>
      <li class="event__cards__item">
        <div class="event-card">
            <img src="<?php echo URLROOT ."/public/assets/img/" . $post -> event_image; ?>" alt="" class="card__image card__image--fence">
            <div class="card__content">
            <div class="card__title">
                <p><?php echo $post -> event_title; ?></p>
            </div>
            <p class="card__text"><?php echo $post -> event_text; ?></p>
            <a href="<?php echo URLROOT; ?>/pages/eventpost/<?php echo $post -> event_post_id; ?>" class="btn card_btn">Read More</a>
          </div>
        </div>
      </li> 
      <?php endforeach; ?>
    </ul>
  </main>
<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
