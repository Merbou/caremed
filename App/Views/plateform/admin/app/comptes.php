
  <nav class="navbar navbar-expand  bg-dark fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Admin ". ucfirst($admin['name'])." ". ucfirst($admin['firstName'])?></a>


<!-- Navbar -->

</nav>

<div id="wrapper ">

<!-- Sidebar -->
<ul class="sidebar mt-2 navbar-nav">
  



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




<div class="mt-5 col-lg-10  row offset-lg-2" >
                
        <?php 

echo "
       <table class='table'>
  <thead>
    <tr>
        <th>#ID</th>
        <th>Nom</th>
      <th>Prenom</th>
      <th>Email</th>
      <th>Compte</th>
      <th></th>

      </tr>
  </thead>
  <tbody>
  ";
      foreach($comptes as $compte){
          echo "
          <tr>
          
          <td>".$compte['id']."</td>
          <td>".$compte['nom']."</td>
          <td>".$compte['prenom']."</td>
          <td>".$compte['email']."</td>        
          <td>".$compte['compte_type']."</td>        

          
          <td> 
          <form action='' method='post'>
          <input type='hidden' name='id' value='".$compte['id']."'>
          <a href='index.php?url=modificationcompte/".$compte['id']."' class='btn btn-primary'>Modifier</a>
          "?><input onclick='return confirm("Are you sure ?")' type='submit' class='btn btn-danger' value='Supprimer' style='cursor:pointer;'>        
          </form>
          </td>
          
          </tr>
          <?php
  
          
      }

          ?>

          

            
            
                
  </div>