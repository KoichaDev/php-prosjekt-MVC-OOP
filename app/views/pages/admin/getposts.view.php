<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>
	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <h1>All posts</h1>
        <table>
            <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Published At</th>
                    <th>Edit Post</th>
                    <th>Delete Post</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['user_post'] as $post) : ?>
                    <tr>
                        <td><?php echo $post -> id; ?></td>
                        <td>
                            <img src="<?php echo $post -> image; ?>" alt="" width="100" height="100">
                        </td>
                        <td><?php echo $post -> title; ?></td>
                        <td><?php echo $post -> author; ?></td>
                        <td><?php echo $post -> published_at; ?></td>
                        <td>
                            <a 
                            href="<?php echo URLROOT; ?>/admins/editpost/<?php echo $post -> id; ?>"
                            style="text-decoration: underline; color: blue;"
                            >Edit</a>
                        </td>
                        <td>
                            <a 
                                href="<?php echo URLROOT; ?>/admins/deletepost/<?php echo $post -> id; ?>"
                                style="text-decoration: underline; color: blue;"
                                >Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
	</div>
<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
