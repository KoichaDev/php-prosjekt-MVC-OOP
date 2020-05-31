<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>

	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
       <div class="post">
            <h3>Settings</h3>
            <thead>
                <tr>
                    <td>Disable Account: </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo $data['user'] -> id; ?>" class="disable-user" style="color: blue;">Are you sure?</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php require_once APPROOT . '/views/pages/admin/includes/modal_disable_user.inc.php'; ?>
                    </td>
                </tr>
            </thead>
        </div>
	</div>

<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
