<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>

	<div class="nav-btn">Menu</div>
	<div class="container">
		
		<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
		<div class="main-content">
			<h1>Dashboard</h1>
			<?php foreach ($data['posts'] as $post) : ?>
				<div class="panel-wrapper">
					<div class="panel-head">
						<?php echo $post -> title; ?> - Author: <?php echo $post -> author; ?>
					</div>
					<div class="panel-body">
						<?php echo $post -> text; ?>
					</div>
				</div>		
				<a href="<?php echo URLROOT; ?>/pages/blog/<?php echo $post -> id; ?>" class="btn"> Til Blogg »</a>
			<?php endforeach; ?>
		</div>
	</div>

<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
