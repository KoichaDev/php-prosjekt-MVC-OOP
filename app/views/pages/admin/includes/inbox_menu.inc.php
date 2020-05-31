 <header class="header">
    <form action="">
        <input type="search" name="s" placeholder="Search on simplest" />
    </form>
    <div class="clr"></div>
    </header>
    <div class="container">
    <div class="messages">
        <h1>Inbox <span class="icon icon-arrow-down"></span></h1>
        <form action="">
            <input type="search" class="search" placeholder="Search Inbox" />
        </form>
        <ul class="message-list">
        <?php foreach ($data['inbox_messages'] as $message) : ?>
          <a href="<?php echo URLROOT; ?>/admins/message/<?php echo $message -> msg_id; ?>">
            <li class="new">
                <div class="preview">
                <h3><?php echo $message -> msg_from_user_email; ?> <small><?php echo $message ->  msg_created_at; ?></small></h3>
                <p>
                    <strong><?php echo $message -> msg_title; ?> - </strong><?php echo substr($message -> msg_text, 0, 10); ?>
                </a>
                    <a href="<?php echo URLROOT; ?>/admins/deletemessage/<?php echo $message -> msg_id; ?>" class="new__delete">X</a>
                </p>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</header>