

	<!-- Header -->
	<?php $this->style['background']="background-color: rgb(30,144,255,0.4);"?>
	<header class="headerLogin">
		
		

		<!-- Logo -->
		

		<div class="container mt-1" style="padding-top: 30px">

		<div class="col-lg-4 offset-lg-4">

			<div class="col-lg-10 ">
					<div class="logo_container offset-lg-2  col-lg-12">
									<img class="ml-5 mt-4" src='public/img/nav/lg1.png'>
									<!-- <a href="#">
										<div class="logo_content d-flex flex-column align-items-start justify-content-center">
											<div class="logo_line"></div>
											<div class="logo d-flex flex-row align-items-center justify-content-center">
												<div class="logo_text">Care<span>Med</span></div>
												<div class="logo_box">+</div>
											</div>
											<div class="logo_sub">Health Care Center</div>
										</div>
									</a> -->
					</div>
			</div>
		</div>















			<div class="card mt-5 col-lg-4 offset-lg-4">
							  <div class="card-body">
								  <form method="post" action="">
									 
									 
								  <div class="form-group">
									    <label for="email">Email address</label>
									    <input type="text" class="form-control
										<?php 
										echo isset($email)?'is-invalid':''
										?>
										" id="email"  name="email" placeholder="E-mail">
										
											<div class='invalid-feedback'>
											<?php echo $email ?>
											</div> 
											

									  </div>
									  
									  <div class="form-group">
									 
									    <label for="password">Password</label>
									    <a href="" class="float-right">Forgot your Password?</a>
									    <input type="password" class="form-control
										<?php 
										echo isset($password)?'is-invalid':''
										?>
										" id="password"  name="password" placeholder="Password">
										
									
											<div class='invalid-feedback'>
											<?php echo $password ?>
											</div> 

										</div>
									 
									  <button type="submit" style="cursor: pointer;" class="btn btn-block btn-success">Indetifier</button>
									</form>
							  </div>
			</div>
				 		












			<div class="card mt-5 col-lg-4 offset-lg-4">
					<div class="card-body pl-5">
						back to Home page ? <a href="index.php">Accueil</a>
					</div>
			</div>


















				<div class="mt-5 mb-2 col-lg-4 offset-lg-4">


					<div class="mt-5 col-lg-12">
									<a class="px-1 text-white" href="index.php">Home</a>
									<a class="px-1 text-white" href="">About us</a>
									<a class="px-1 text-white" href="">Services</a>
									<a class="px-1 text-white" href="">News</a>
									<a class="px-1 text-white" href="">Contact</a>
					</div>					
				</div>

			
			
	</header>


