<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>

<form action="" method="POST" class="login-form">
    <h1>Logg in</h1>

    <input type="text" name="email" placeholder="Email" />
    <p class="invalid-feedback"><?php echo $data['email_err']; ?></p>
    <p class="invalid-feedback"><?php echo $data['isBanned_err']; ?></p>
    <p class="invalid-feedback"><?php echo $data['isDisabled_err']; ?></p>
    <p class="invalid-feedback"><?php echo $data['isBannedDisabled_err']; ?></p>   

    <input type="password" name="password" placeholder="Password"/>
    <p class="invalid-feedback"><?php echo $data['password_err']; ?></p>

    <input type="submit" class="btn-login" value="Logg inn">
    <a href="<?php echo URLROOT; ?>/users/register" class="btn-register">Registrer</a>
</form>

<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
