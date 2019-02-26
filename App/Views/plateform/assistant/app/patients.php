
  <nav class="navbar navbar-expand fixed-top bg-dark ">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Assistant ". ucfirst($assistant['name'])." ".ucfirst($assistant['firstName'])
?></a>


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








<div class="card mt-5 col-lg-10  offset-lg-2" >

<?PHP
    
    if(!empty($patients)){
echo "
       <table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Email</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  ";
      foreach($patients as $patient){
          echo "
          <tr>
          <th scope='row'>".$patient['id']."</th>
          <td>".$patient['nom']."</td>
          <td>".$patient['prenom']."</td>
          <td>".$patient['email']."</td>        

          
          </tr>
          ";
  
          
      }
  }
?>


    
 
  </tbody>
</table>
  </div>