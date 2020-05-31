<div class="comments">
	<?php if($data['current_user']) : ?>
		<div class="comment-wrap">
				<div class="photo">
				</div>
				<div class="comment-block">
						<form action="" method="POST">
							<textarea name="blog_text" id="" cols="30" rows="2" placeholder="Add comment..."></textarea>
								<div class="bottom-comment">
									<ul class="comment-actions">
										<li class="reply">
											<input type="submit" class="btn-reply" value="Reply">
										</li>
									</ul>
								</div>
						</form>
				</div>
			</div>
		<?php else : ?>
				<div class="comment-wrap">
				<div class="photo">
				</div>
				<div class="comment-block">
						<p><strong>You Must be logged in to comment</strong></p>
						<p><small><a href="<?php echo URLROOT; ?>/users/login" style="color: blue; text-decoration: underline;">Click here to login</a></small></p>
				</div>
			</div>
	<?php endif; ?>
		<?php foreach ($data['blogs'] as $blog) : ?>
		<div class="comment-wrap">
			<div class="photo">
				<img src="<?php echo $blog -> image; ?>" alt="" class="avatar">
			</div>
			<div class="comment-block">
				<p class="comment-text">
					<?php echo $blog -> blog_text; ?>
				</p>
				<div class="bottom-comment">
					<div class="comment-date"> 
						<?php echo $blog -> blog_user_name; ?> 
						<?php echo $blog -> blog_published_date; ?>
					</div>
					<ul class="comment-actions">
						<?php if(isset($_SESSION['user_id'])) : ?>
							<!-- Checking if the user is admin, or if the post is owned by the same user that posted the blog -->
							<?php if($data['admin'] || $data['post'] -> author_id === $_SESSION['user_id']) : ?>
								<li class="complain">
									<a class="complain__model-btn" href="<?php echo URLROOT; ?>/pages/reportuser/<?php echo $blog -> blog_id; ?>" style="color: #CCCC00;">Report</a>
								</li>
								<li class="reply">
									<a href="<?php echo URLROOT; ?>/pages/deleteblogcomment/<?php echo $blog -> blog_id; ?>" style="color: red;">Delete</a>
								</li>
							<?php else : ?>
								<li class="complain">
									<a class="complain__model-btn" href="<?php echo URLROOT; ?>/pages/reportuser/<?php echo $blog -> blog_id; ?>" style="color: #CCCC00;">Report</a>
								</li>
							<?php endif; ?>
						<?php else : ?>
							<li class="complain">
								<a class="complain__model-btn" href="<?php echo URLROOT; ?>/pages/reportuser/<?php echo $blog -> blog_id; ?>" style="color: #CCCC00;">Report</a>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>