  <nav class="navbar navbar-expand  bg-dark fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Admin ". ucfirst($admin['name'])." ".ucfirst($admin['firstName']) ?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
  


<li class="nav-item">
    <a class="nav-link" href="index.php?url=registercompte">
  <span class="text-light active">Creation des Comptes</span></a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="index.php?url=gestioncompte">
  <span class="text-light">Gestion des comptes</span></a>
  </li>
  

  <li class="nav-item">
    <a class="nav-link" href="index.php?url=gestionhoraires">
  <span class="text-light">gestion des horaires</span></a>
  </li>
  

  
  <li class="nav-item">
    <a class="nav-link" href="index.php?url=news">
  <span class="text-light">Message de news</span></a>
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
										" id="name" name="name" 
                                        placeholder="<?php echo $compteUpdate['name'] ?>"
                                        >
										
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
										<?php echo  isset($errors['firstName'])?'is-invalid':''
										?>
										" id="firstName" name="firstName"
                                        placeholder="<?php echo $compteUpdate['firstName'] ?>"
                                        >
										
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
                                        
										" id="email"  name="email" 
                                        placeholder="<?php echo $compteUpdate['email'] ?>">
										
										<?php
										if(isset($errors['email'])) 
										echo "<div class='invalid-feedback'>".
											$errors['email']."
										</div>"
										?>

									  </div>

										<div class="form-group">
										  <label for="compte_type">Choisier le type de compte svp:</label>
											<select class="form-control" name="compte_type" id="compte_type">
										
												<option value="medecin" 
                                                <?php echo ($compteUpdate['compte_type']=='medecin')?'selected="selected"':''	?>		
                                                >Medecin</option>

												<option value="assistant" 
                                                <?php  echo ($compteUpdate['compte_type']=='assistant')?'selected="selected"':''	?>
                                                >Assistant</option>
												
												<option value="patient" 
                                                <?php  echo ($compteUpdate['compte_type']=='patient')?'selected="selected"':''	?>
                                                >Patient</option>
												
												
												
											</select>
									
										</div>

									  <div class="form-group">
									    <label for="password">Password</label>

									    <input type="password" class="form-control
										<?php 
										echo isset($errors['password'])?'is-invalid':''
										?>
										" id="password" name="password" placeholder="Password" >
										
                                        <?php 
                                        
										if(isset($errors['password']))
										echo "<div class='invalid-feedback'>".
                                        $errors['password']."
										</div>"
										?>

									  </div>

									   
									  <button type="submit" style="cursor: pointer;" class="btn btn-block btn-success">Modifier le compte</button>
									</form>
							  </div>

           	</div>
				 		