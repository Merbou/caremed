
  <nav class="navbar navbar-expand  bg-dark fixed-top ">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Mr ". ucfirst($medecin['name'])." ". ucfirst($medecin['firstName'])?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
  



<li class="nav-item">
    <a class="nav-link" href="index.php?url=recherche">
  <span class="text-light active">Rechercher votre patient</span></a>
  </li>




  <li class="nav-item">
    <a class="nav-link" href="index?url=parametre">
  <span class="text-light">Parametre</span></a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="index.php?url=logout">
      <span class="text-light">Logout</span></a>
  </li>
  
</ul>
</div>

<div class="card mt-5 col-lg-10  offset-lg-2" >


    <form class="row mt-3" method="post" action="" >
                    
                            <div class="form-group col-10">
                            <label for="specialite" >Insert votre specialité :</label>
                            <input type="text" name="specialite" class="form-control
                                <?php 
                                        echo empty($errors['specialite'])?'':'is-invalid'
                                    ?>"
                                id="specialite"
                            placeholder="Specialite">      
                            
                            <div class='invalid-feedback'>
                                                        <?php echo $errors['specialite'] ?>
                                                        </div> 
                            
                        </div>
                        <div class="form-group  " style="margin-top: 31px;">
                                <input type="submit" class=" btn btn-block  btn-success" value="Post">
                            </div>
            
    </form>

</div>