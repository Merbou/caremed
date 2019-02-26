
  <nav class="navbar navbar-expand  bg-dark fixed-top ">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Assistant ". ucfirst($assistant['name'])?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
  



<li class="nav-item">
    <a class="nav-link" href="index.php?url=rendezvous">
  <span class="text-light active">Programmer Rendez-Vous</span></a>
  </li>



  <li class="nav-item">

  <a class="nav-link" href="index.php?url=Registerpatient">
    <span class="text-light">Creation comptes patient</span></a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link" href="index.php?url=patients">
  <span class="text-light">patients</span></a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="index.php?url=logout">
      <span class="text-light">Logout</span></a>
  </li>
</ul>
</div>
<div class="card mt-5 col-lg-4 offset-lg-4">
							  <div class="card-body">
								  <form action="" method="post">

								  	 <div class="form-group">
									    <label for="name">name</label>
									    <input type="text" class="form-control 
										<?php 
										echo isset($errors['name'])?  'is-invalid': ''
										?>
										" id="name" name="name" placeholder="name">
										
										<?php 
										if(isset($errors['name']))
										echo "<div class='invalid-feedback'>
										".$errors['name']
										."</div>"
										?>
									  
									  </div>
									  
									  <div class="form-group">
									    <label for="firstName">firstName</label>
									    <input type="text" class="form-control 
										<?php  
										echo  isset($errors['firstName'])?'is-invalid':''
										?>
										" id="firstName" name="firstName" placeholder="firstName">
										
										<?php 
										if(isset($errors['firstName']))
										echo "<div class='invalid-feedback'>
										".$errors['firstName']."
										</div>"
										?>

									  </div>

									  

									  <div class="form-group">
									    <label for="email">Email address</label>
									    <input type="text" class="form-control
										<?php 
										echo isset($errors['email'])?'is-invalid':''
										?>
										" id="email"  name="email" placeholder="E-mail">
										
										<?php
										if(isset($errors['email'])) 
										echo "<div class='invalid-feedback'>".
											$errors['email']."
										</div>"
										?>

									  </div>

									    <input class="form-control"  value="patient" name="compte_type" type="hidden" id="compte_type">
										

									  <div class="form-group">
									    <label for="password">Password</label>

									    <input type="password" class="form-control
										<?php 
										echo isset($errors['password'])?'is-invalid':''
										?>
										" id="password" name="password" placeholder="Password">
										
                                        <?php 
                                        
										if(isset($errors['password']))
										echo "<div class='invalid-feedback'>".
                                        $errors['password']."
										</div>"
										?>

									  </div>

									   
									  <button type="submit" style="cursor: pointer;" class="btn btn-block btn-success">Creer un compte</button>
									</form>
							  </div>
			</div>
				 		