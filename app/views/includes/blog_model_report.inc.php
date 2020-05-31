<div class="modal-container">
  <input id="modal-toggle" type="checkbox">
  <label class="modal-btn" for="modal-toggle" style="display:none; ">Click me</label> 
  <label class="modal-backdrop" for="modal-toggle"></label>
  <div class="modal-content">
    <label class="modal-close" for="modal-toggle">&#x2715;</label>
    <h2>Report User</h2>
    <hr />
    <form action="" method="POST" class="modal-form">
      <input type="hidden" class="report_blog_id" name="report_blog_id" value="">
        <textarea 
            name="report_user"
            class="textarea-input" 
            cols="40" 
            rows="8" 
            placeholder="Reason you want to report..."
        ></textarea>
        <input class="modal-content__href modal-content-btn" type="submit" class="btn-reply" value="Reply">
    </form>
  </div>          
</div>  


<?php require_once APPROOT . '/views/includes/blog_model_report.inc.php'; ?>
