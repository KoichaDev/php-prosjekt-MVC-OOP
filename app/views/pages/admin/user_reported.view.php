<?php include_once APPROOT . '/views/pages/admin/includes/user_reported_table.inc.php'; ?>
<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>
	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <h1>Users Reported</h1>
        <br>
        <h4>Sort On:</h4>
        <select name="sort" id="sort">
            <option value="<?php echo URLROOT; ?>/admins/sortUserByIdAsc">User ID (High to Low)</option>
            <option value="<?php echo URLROOT; ?>/admins/sortUserByIdDesc">User ID (Low to High)</option>
            <option value="<?php echo URLROOT; ?>/admins/sortNameAsc">Name (Low to High)</option>
            <option value="<?php echo URLROOT; ?>/admins/sortNameDesc">Name (High to Low)</option>
            <option value="<?php echo URLROOT; ?>/admins/sortEmailAsc">Email (Low to High)</option>
            <option value="<?php echo URLROOT; ?>/admins/sortEmailDesc">Email (High to Low)</option>
        </select>
        <table style="margin-top: 1rem;">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Post</th>
                    <th>Reason</th>
                    <th>Reported Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            <?php
                switch (isset($data)) {
                    case isset($data['users_reported_by_id_asc']):
                        # code...
                        break;
                    case isset($data['users_reported_by_id_desc']):
                        foreach ($data['users_reported_by_id_desc'] as $user) {
                            userReportedTable($user);
                        } 
                    break;

                    default:
                        foreach ($data['users_reported'] as $user) {
                        userReportedTable($user);
                        }
                    break;
                }
            ?>
            </tbody>
        </table>
	</div>
<?php require_once APPROOT . '/views/pages/admin/includes/footer.inc.php'; ?>
