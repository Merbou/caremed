
  <nav class="navbar navbar-expand  bg-dark fixed-top ">

<a class="navbar-brand mr-1 text-light " href="index.php">
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



<div class="card mt-5 col-lg-4 offset-lg-4 ">
							  <div class="card-body">
								  <form action="" method="post">

								  	 <div class="form-group">
									    <label for="news">news</label>
									    <input type="text" class="form-control"
                                         id="news" name="news" placeholder="Message de news">
									  </div>

									   
									  <button type="submit" style="cursor: pointer;" class="btn btn-block btn-success">Creer un compte</button>
									</form>


								  <form action="" method="post">
                  <input type="hidden" name="news" value>
                  <button type="submit" style="cursor: pointer;" class="btn btn-danger btn-block mt-3">Supprimer tous les messages </button>
									</form>

							  </div>
			</div>
				 		