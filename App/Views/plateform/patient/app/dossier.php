
  <nav class="navbar navbar-expand  bg-dark fixed-top ">

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





<div class="mt-5 col-lg-10  row offset-lg-2 pt-5"  >
                
        <?php 
            foreach($Dossiers as $dossier)
            echo "<a href='index.php?url=resultat/".$dossier['id']."' class=' mx-3 text-info' 
            style='text-decoration:none;
            border: #094273 1px solid;
            '>
            <div class='card ' style='max-width: 18rem;'>
              <div class='card-header'>Specialité  ".$dossier['soin']."</div>
              <div class='card-body'>
                <h6 class='card-title'>Dr ".$dossier['medecin_id']['name']
                ." ".
                $dossier['medecin_id']['firstName']."</h6>
                
              </div>
              <div class='card-footer'></div>
              </div>
                </a>"
            
                ?>
                
  </div>


                
  </div>