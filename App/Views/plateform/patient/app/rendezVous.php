
  <nav class="navbar navbar-expand  bg-dark fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Patient ". ucfirst($patient['name'])." ".ucfirst($patient['firstName'])
?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
  



<li class="nav-item">
    <a class="nav-link" href="index.php?url=rendezvous">
  <span class="text-light active">Rendez-Vous</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="index.php?url=dossier">
  <span class="text-light">Dossier</span></a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="index.php?url=ordonnance">
  <span class="text-light">Consulter Les ordonnances</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="index.php?url=logout">
      <span class="text-light">Logout</span></a>
  </li>
</ul>
</div>








<div class="card mt-5 col-lg-8  offset-lg-3" >
        <form class="row mt-3" method="post" action="" >
                

                <div class="form-group col-lg-12">
        
                  <textarea name="descrip" class="form-control
                  <?php 
										echo empty($errors['descrip'])?'':'is-invalid'
										?>"
                    id="descrip"
                  placeholder="Descriptionn des Soins" cols="30" rows="6"><?php 
										
										?></textarea>
                  
                  
									
											<div class='invalid-feedback'>
											<?php echo $errors['descrip'] ?>
											</div> 
                  
                  
                </div>
                <div class="form-group col-lg-12">
										  <label for="type_soin">Choisier le type de soin svp:</label>
											<select class="form-control" name="type_soin" id="type_soin">

                    <?php foreach($soins as $soin){
                      echo '<option value="'.$soin['type_soin'].'">'.ucfirst($soin['type_soin']).'</option>';
                    }
                  ?>									
												
                        																								 												
												
												
											</select>
																		
										</div>

                <div class="form-group col-lg-8 offset-lg-2 ">
                    <input style="cursor:pointer" type="submit" class="form-control btn btn-success" value="Prender un RENDEZ-VOUS">
                </div>

                
        </form>
  </div>