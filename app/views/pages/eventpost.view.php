<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>
<main class="blog-container">
        <div class="blog-container__blog-post">
            <img src="<?php echo $data['post'] -> event_image; ?>" alt="">
        <h1 class="blog-container__blog-title"><?php echo $data['post'] -> event_title; ?></h1>
        <h2 class="blog-contaienr__date">Posted <?php echo $data['post'] -> event_created; ?></h2>
        <div id="demo">
 
  
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
    <div class="table-responsive-vertical shadow-z-1">
    <!-- Table starts here -->
    <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
            <tr>
            <th>Pending</th>
            <th>Going</th>
            <th>Interested</th>
            <th>Not Going</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php foreach ($data['user_status'] as $user) : ?>
                <td data-title="pending"><?php echo $user -> user_email; ?></td>
            <?php 
            if($_SESSION['user_email'] == $user -> user_email) {
                if($user -> event_status === 'PENDING') {
                    ?>
                     <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;">Going</a>
                    </td>
                    <td data-title="interested">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;">interested</a>
                    </td>
                    <td data-title="not-going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;" >Not Going</a>
                    </td>
                    <?php
                }
                if($user -> event_status === 'GOING') {
                    ?>
                    <td data-title="going"><?php echo $user -> user_email; ?> </td>
                        <td data-title="interested">
                            <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;">interested</a>
                        </td>
                        <td data-title="not-going">
                            <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;" >Not Going</a>
                    </td>
                    <?php
                }

                if($user -> event_status === 'INTERRESTED') {
                    ?>
                    <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;">Going</a>
                    </td>
                    <td data-title="interested"><?php echo $user -> user_email; ?> </td>
                    <td data-title="not-going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;">Not Going</a>
                    </td>
                    <?php
                }

                 if($user -> event_status === 'NOT_GOING') {
                    ?>
                    <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;">Going</a>
                    </td>
                    <td data-title="interested">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;">interested</a>
                    </td>
                    <td data-title="not-going"><?php echo $user -> user_email; ?> </td>
                    <?php
                 }
            } else {
             if($user -> event_status === 'PENDING') {
                    ?>
                     <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;"></a>
                    </td>
                    <td data-title="interested">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;"></a>
                    </td>
                    <td data-title="not-going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;" ></a>
                    </td>
                    <?php
                }

                if($user -> event_status === 'GOING') {
                    ?>
                    <td data-title="going"><?php echo $user -> user_email; ?> </td>
                        <td data-title="interested">
                            <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;"></a>
                        </td>
                        <td data-title="not-going">
                            <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;" ></a>
                    </td>
                    <?php
                }

                if($user -> event_status === 'INTERRESTED') {
                    ?>
                    <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;"></a>
                    </td>
                    <td data-title="interested"><?php echo $user -> user_email; ?> </td>
                    <td data-title="not-going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/NOT_GOING" style="color: blue;"></a>
                    </td>
                    <?php
                }

                 if($user -> event_status === 'NOT_GOING') {
                    ?>
                    <td data-title="going">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/GOING" style="color: blue;"></a>
                    </td>
                    <td data-title="interested">
                        <a href="<?php echo URLROOT; ?>/pages/eventGoing/<?php echo $user -> event_post_id; ?>/INTERRESTED" style="color: blue;"></a>
                    </td>
                    <td data-title="not-going"><?php echo $user -> user_email; ?> </td>
                    <?php
                 } 
            }
                    ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <h3>Event Description</h3>

    <p class="blog-container__blog-content"><?php echo $data['post'] -> event_text; ?></p>
    </main>
<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
