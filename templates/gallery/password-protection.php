<div class="scale--both bw--page">
	<div class="password-protection">
		<form method="post" action=" <?php echo site_url(); ?>/wp-login.php?action=postpass" name="password-protection">
			
			<div class="fa fa-lock"></div>
			
			<p>
				<?php if(!empty($_POST)) {d($_POST);exit;} echo __('This is a password protected area. Please enter password:', BW_THEME); ?>
				<?php if(defined('BW_INVALID_POST_PASS')) _e('The password you entered is wrong, please try again.'); ?>
			</p>
			<div class="fields">
				<input name="post_password" class="ClientPasswordInput" id="post-password" type="password" placeholder="<?php echo __('Password', BW_THEME); ?>" autocomplete="off">
				<button type="submit" class="ClientSubmit" name="Submit"><i class="fa fa-sign-in"></i></button>
			</div>
			
		</form>
	</div>
</div>