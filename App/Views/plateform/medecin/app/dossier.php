
  <nav class="navbar navbar-expand  bg-dark fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Mr ". ucfirst($medecin['name'])." ".ucfirst($medecin['firstName'])
?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
    



<li class="nav-item">
    <a class="nav-link" href="index.php?url=recherche">
  <span class="text-light active">Rechercher votre patients</span></a>
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










<div class="mt-5 col-lg-10  row offset-lg-2" >
                
        <?php 
            foreach($Dossiers as $dossier )
            echo "<a href='index.php?url=resultat/".$dossier['id']."' class=' mx-3 text-info' 
            style='text-decoration:none;
            border: #094273 1px solid;
            '>
            <div class='card ' style='max-width: 18rem;'>
              <div class='card-header'>".$dossier['soin']."</div>
              <div class='card-body'>
                <h5 class='card-title'>".$dossier['patient_id']['name']
                ." ".
                $dossier['patient_id']['firstName']."</h5>
                
              </div>
              <div class='card-footer'></div>
              </div>
                </a>"
            
                ?>
                
  </div>
                <!-- <p class='card-text'></p> -->