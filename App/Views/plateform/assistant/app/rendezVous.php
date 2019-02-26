
  <nav class="navbar navbar-expand  bg-dark fixed-top">

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


       <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">User</th>
      <th scope="col">desciption</th>
      <th scope="col">Soins</th>
      <th scope="col">Medecin</th>

    </tr>
  </thead>
  <tbody>
  
    <?PHP

    foreach($rvs as $rv){ 
      echo "
        <form action='' method='POST'>
        <tr>
        <th scope='row'><input class='form-control' type='date'  name='dateAffecter' value='". date('Y-m-d') ."'></th>
        <input type='hidden' name='patient_id' value='".$rv['user']."'>
        <input type='hidden' name='soin' value='".$rv['soin']."'>

        <td>".$rv['user']."</td>
        <td>".$rv['descrip']."</td>
        <td>".$rv['soin']."</td>
        
        <td>
          <select class='form-control' name='medecinAffecter'>
          ";
          
          for($i=0;$i<count($SpeMedecin);$i++){

              if(!empty($SpeMedecin[$i]['specialite']))
             if($SpeMedecin[$i]['specialite']==$rv['soin'])
            echo "<option  value='".$SpeMedecin[$i]['id']."'>".$SpeMedecin[$i]['NameMr']." ".$SpeMedecin[$i]['FirstNameMr']."</option>";

          }
        echo "
          </select>
          <td><input type='submit' class='btn btn-secondary' value='Affecter'></td>        
        
          </td>
        </tr>
        </form>
        ";
 
        
    }
?>


    
 
  </tbody>
</table>
  </div>