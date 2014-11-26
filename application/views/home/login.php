<div class="row">
	<div class="col-md-4"></div>
	<div id="content" class="col-md-4">
		<br>
		<div id="register_error" class="alert alert-danger hide" role="alert">
			<ul class="error">
				<li><strong>Oh snap!</strong> Change a few things up and try submitting again.</li>
			</ul>
			
		</div>
		<div class="frm-sign-in">
			<h3 >Login</h3>
			<form id="frm-login" role="form"  action="<?php echo base_url("home/auth")?>" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter email/username" name="username">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password">
				</div>
				
				<div class="checkbox">
					<label>
						<input type="checkbox"> Remember me
					</label>
				</div>
				<button type="submit" class="btn btn-default btn-jingga">Sign in</button>
			</form>
		</div>
		<div class="frm-sign-up hide">
			<h5 class="title">Already have an account? <a id="login-chor">Sign me in</a></h5>
			
			<form role="form" id="frm-register"  action="<?php echo base_url("home/register")?>" method="post">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Choose username" name="username">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Email address" name="email" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Confirm Password" name="password2">
				</div>
				
				<button type="submit" class="btn btn-default btn-jingga">Sign up</button>
			</form>
		</div>
		<br>
	</div>
	<div class="col-md-4"></div>
</div>

