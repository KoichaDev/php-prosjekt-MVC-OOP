<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>

	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <div class="container app">
            <div class="main">

                <div class="clr"></div>
                </header>
                <div class="container">
                <?php require_once APPROOT . '/views/pages/admin/includes/inbox_menu.inc.php'; ?>

                <?php require_once APPROOT . '/views/pages/admin/includes/inbox_message.inc.php'; ?>
                </div>
            </div>
        </div>
	</div>
<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
