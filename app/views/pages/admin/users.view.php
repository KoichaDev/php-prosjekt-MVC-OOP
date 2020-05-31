<?php require_once APPROOT . '/views/pages/admin/includes/header.inc.php'; ?>
	<div class="nav-btn">Menu</div>
	<div class="container">
		
	<?php require_once APPROOT . '/views/pages/admin/includes/sidebar.inc.php'; ?>
    
	<div class="main-content">
        <h1>All Users</h1>
        <br>
        <select name="sort" id="sort">
            <option value="<?php echo URLROOT; ?>/admins/users/userIdAscend">Sort User ID (Ascend)</option>
            <option value="<?php echo URLROOT; ?>/admins/users/userIdAscend">Sort User ID (Descend)</option>
        </select>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['users'] as $user) : ?>
                <tr>
                    <td><?php echo $user -> id; ?></td>
                    <td>
                        <img src="<?php echo $user -> image; ?>" alt="" width="100" height="100">
                    </td>
                    <td><?php echo $user -> name; ?></td>
                    <td><?php echo $user -> created_at; ?></td>
                    <td>
                        <?php 
                                switch ($user -> role) {
                                    case 'admin':
                                        ?>
                                        <select name="role" class="select-role">
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserRole/<?php echo $user -> id; ?>/admin">
                                                <?php echo ucfirst($user -> role); ?>
                                            </option>
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserRole/<?php echo $user -> id; ?>/regular">
                                               Regular
                                            </option>
                                          </select>
                                        <?php
                                        break;
                                     case 'regular':
                                        ?>
                                        <select name="role" class="select-role">
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserRole/<?php echo $user -> id; ?>/regular">
                                               <?php echo ucfirst($user -> role) ?>
                                            </option>
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserRole/<?php echo $user -> id; ?>/admin">
                                                Admin
                                            </option>
                                        </select>
                                        <?php
                                        break;
                                    default:
                                        break;
                                }
                            ?>
                    </td>
                    <td>
                        <?php 
                                switch ($user -> active) {
                                    case 'enabled':
                                        ?>
                                        <select name="active" class="select-active-user">
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserActive/<?php echo $user -> id; ?>/enabled">
                                                <?php echo ucfirst($user -> active); ?>
                                            </option>
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserActive/<?php echo $user -> id; ?>/disabled">
                                               Disabled
                                            </option>
                                          </select>
                                        <?php
                                        break;
                                     case 'disabled':
                                        ?>
                                        <select name="active" class="select-active-user">
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserActive/<?php echo $user -> id; ?>/disabled">
                                               <?php echo ucfirst($user -> active) ?>
                                            </option>
                                            <option value="<?php echo URLROOT; ?>/admins/changeUserActive/<?php echo $user -> id; ?>/enabled">
                                                Enabled
                                            </option>
                                        </select>
                                        <?php
                                        break;
                                    default:
                                        break;
                                }
                            ?>
                    </td>
                    
                    <td>
                        <a 
                            href="<?php echo URLROOT; ?>/admins/deleteuser/<?php echo $user -> id; ?>"
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
