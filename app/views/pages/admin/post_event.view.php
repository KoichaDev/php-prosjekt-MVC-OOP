<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>

	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <div class="post">
            <h3>Post a New Event</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Add a title Event">

                <label for="post-event-image">Add Event Image</label>
                <input type="file" name="image" id="post-event-image" required>
                <br>
                <br>

                <input type="checkbox" id="add-all-users" name="add-all-users" value="users">
                <label for="add-all-users"> Invite All Users</label><br>
                
                <div class="input-field">
                    <?php ?>
                    <input type="text" name="members[]" class="invite-members"  placeholder="Invite members">
                </div>

              <textarea name="body" class="editor" placeholder="About this event..."></textarea>
                <div class="buttons">
                    <button type="reset">clear</button>
                    <button type="submit" class="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>

<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
