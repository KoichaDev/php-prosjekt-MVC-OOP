<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>

	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <div class="post">
            <h3>Add New Post</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" value="<?php echo $data['title']; ?>" placeholder="Add a title...">
                <label for="post-event-image">Add Post Image</label>
                <input type="file" name="image" id="post-event-image" required>
                <br>
                <br>
                <textarea name="body" class="editor" placeholder="Add some text..."><?php echo $data['body']; ?></textarea>
                <div class="buttons">
                    <button type="reset">clear</button>
                    <button type="submit">Submit</button>
                </div>
            </form>
		</div>
	</div>

<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
