<?php require_once APPROOT . '/views/includes/header.inc.php'; ?>
<form action="" class="login-form" method="post" enctype="multipart/form-data">
    <h1>Registrer</h1>
    
    <label for="post-image">Add Profile Image</label>
    <input type="file" name="image" id="post-image">

    <label for="name">Name: <sup>*</sup> </label>
    <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $data['name']; ?>" />
    <p class="invalid-feedback"><?php echo $data['name_err']; ?></p>

    <label for="email">Email: <sup>*</sup> </label>
    <input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $data['email']; ?>" />
    <p class="invalid-feedback"><?php echo $data['email_err']; ?></p>

    <label for="name">Password: <sup>*</sup> </label>
    <input type="password" name="password" placeholder="Must be 6 characters"/>
    <p class="invalid-feedback"><?php echo $data['password_err']; ?></p>
    
    <label for="name">Confirm Password: <sup>*</sup> </label>
    <input type="password" name="confirm_password" placeholder="Must be 6 characters"/>
    <p class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></p>

    <input type="submit" name="submit" class="btn-login" value="Registrer">
    <a href="<?php echo URLROOT; ?>/users/login" class="btn-register">Logg inn</a>
</form>

<?php require_once APPROOT . '/views/includes/footer.inc.php'; ?>
