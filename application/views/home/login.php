	<div class="container">
	<div class="row">
		<div class="col-md-8">
			
			<div class="box-wrap left container">
				<div class="row">
					<div id="pinkline">&nbsp;</div>
				</div>	

				<br>

				<div class="embed-responsive embed-responsive-16by9">
					<iframe align="center" class="embed-responsive-item" src="//www.youtube.com/embed/Tomsxe5pHL0" frameborder="0" allowfullscreen></iframe>
				</div>
	
				<br>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero 
			</div>
		</div>
		<div class="col-md-4">
			<div class="box-wrap container">
				<div class="row">
					<div id="pinkline">&nbsp;</div>
				</div>	

				<div class="row">
					<div id="navtitle">
						<div class="col-sm-4">
							<div class="navbar-header">Sportive</div>
						</div>
					</div>
					
				</div>

				<div class="row">
					<div id="content" class="container">
						<br>
						<div id="register_error" class="alert alert-danger hide" role="alert">
							<ul class="error">
								<li><strong>Oh snap!</strong> Change a few things up and try submitting again.</li>	
							</ul>
					      
					    </div>
						<div class="frm-sign-in">
							<h5 id="form_title" class="title">Don't have an account? <a id="register-chor">Register</a></h5>
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
					
				</div>

				<div class="row">
					<div id="footer">
						<div id="pinkline">&nbsp;</div>
						<div class="col-md-12">
							<p>Copyright &copy; 2015. Easy TV.</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>		


<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>