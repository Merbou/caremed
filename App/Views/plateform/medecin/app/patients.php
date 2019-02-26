
  <nav class="navbar navbar-expand  bg-dark fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php"><?php echo "Mr ". 
ucfirst($medecin['name'])." ". ucfirst($medecin['firstName'])?></a>


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
<div class="card mt-5 col-lg-10  offset-lg-2" >



  <form action="" method="post">
      
                    <div class="form-group mt-3">
                        <input type="text" class="form-control "
                        id="recherche" name="recherche" placeholder="Recherchez votre patients par id,nom,prenom">
                    </div>
  </form>

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

          <td><a href='index?url=dossier/".$patient['id']."'>Consulter dossier</a></td>        
          <td><a href='index?url=ordonnance/".$patient['id']."'>Insert une ordonnance</a></td>        
          
          </tr>
          ";
  
          
      }
  }
?>



</tbody>
</table>
</div>