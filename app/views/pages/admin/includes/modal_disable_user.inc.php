<div class="modal-container">
  <input id="modal-toggle" type="checkbox">
  <label class="modal-btn" for="modal-toggle" style="display: none;" >Click me</label> 
  <label class="modal-backdrop" for="modal-toggle"></label>
  <div class="modal-content">
    <label class="modal-close" for="modal-toggle">&#x2715;</label>
    <h2>Disable Your Account</h2>
    <hr />
    <form action="" method="POST" class="modal-form">
      <input type="hidden" class="report_blog_id" name="disable_user_id" value="<?php echo $_SESSION['user_id']; ?>">
      <ul class="ul-btn">
        <li>
          <input type="submit" class="btn btn--primary" name="disable_user_submit" value="Submit">
        </li>
        <li>
          <input type="button" class="btn btn--danger" value="Cancel">
        </li>
      </ul>
    </form>
  </div>          
</div>  

