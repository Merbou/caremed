
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





<div class="mt-5 col-lg-10  row offset-lg-2" >
                
        <?php 


echo "
       <table class='table'>
  <thead>
    <tr>
      <th>Nom de midecament</th>
      <th>description</th>
      <th>quantité</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  ";
      foreach($medicaments as $medicament){
          echo "
          <tr>
          <td>".$medicament['nom_medi']."</td>
          <td>".$medicament['descrip_medi']."</td>
          <td>".$medicament['qnt_medi']."</td>        

          
          </tr>
          ";
  
          
      }


          

            
            
                ?>
                
  </div>


                
  </div>