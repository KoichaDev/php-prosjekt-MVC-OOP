
<nav class="Navbar">
   <div class="Navbar__Link Navbar__Link-brand">
        <?php if(isset($_SESSION['user_id'])) : ?>
        <a href="<?php echo URLROOT; ?>" class="Navbar__Link">STUDENT FORUM</a>
        <a href="<?php echo URLROOT; ?>/admins/index" class="Navbar__Link">Dashboard</a>
        <?php else: ?>
        <a href="<?php echo URLROOT; ?>" class="Navbar__Link">STUDENT FORUM</a>
        <?php endif; ?>
    </div>
    <div class="Navbar__Link Navbar__Link-toggle">
      <i class="fas fa-bars"></i>
    </div>
    <?php if(isset($_SESSION['user_id'])) : ?>
       <div class="Navbar__Items Navbar__Items--right">
          <a href="<?php echo URLROOT; ?>/pages/event" class="Navbar__Link">Events</a>
          <p> <i class="fas fa-user-alt"></i> <?php echo $_SESSION['user_name']; ?> </p>
          <a href="<?php echo URLROOT; ?>/users/logout" class="Navbar__Link">
          <i class="fa fa-sign-out" aria-hidden="true"></i>
            Logg ut
          </a>

      </div>
    <?php else : ?>
      <div class="Navbar__Items Navbar__Items--right">
          <a href="<?php echo URLROOT; ?>/pages/event" class="Navbar__Link">Events</a>
          <a href="<?php echo URLROOT; ?>/users/login" class="Navbar__Link">Logg Inn</a>
      </div>
    <?php endif; ?>
</nav>