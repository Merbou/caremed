
  <nav class='navbar navbar-expand  bg-dark fixed-top'>

<a class='navbar-brand mr-1 text-light' href='index.php'>
<?php echo 'Admin '. ucfirst($admin['name']).' '. ucfirst($admin['firstName'])?></a>


<!-- Navbar -->

</nav>

<div id='wrapper '>

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




<div class="mt-5 col-lg-10  offset-lg-3 pt-3" >
                
<form class="mt-3" method="post" action="" id="form">
    <?php  
  $jour=['samedi','dimanche','lundi','mardi','mercredi','jeudi'];
    for($i=1;$i<7;$i++)
    
    echo "
    <div class='col-12 row'>
    
                            <div class='form-check col-1 '>
                            <input type='checkbox' name=".$jour[$i-1]." class=' form-check-input'
                            id=".$jour[$i-1].">      
                            <label for=".$jour[$i-1]." >".$jour[$i-1]."</label>
                                
                             
                            </div>
                            

                            
                            <div class='form-group col-3' id='champ_nom' value='0'>
                                <label for='ouverture$i' >Heure d'ouverture :</label>
                                
                                <input type='time' name='ouverture$i' class='form-control' id='jour$i'>
                                
                            </div>
    
                            <div class='form-group col-3' id='champ_nom' value='0'>
                                <label for='fermeteur$i' >Heure d'fermeteur:</label>
                                <input type='time' name='fermeteur$i' class='form-control' id='fermeteur$i'
                                placeholder='Fermeteur'>      
                                
                            
                            </div>

                                
                            <div class='form-check col-3' id='champ_nom' value='0'>
                            <input type='checkbox' name='active$i' class='form-check-input'                                    id='active'>      
                            <label for='active$i' >Activer</label>
                                
                                
                            </div>
    </div>   
                                ";?>
                      
                        
                        <div class='form-group col-2  ' >
                                <input type='submit' class=' btn btn-block  btn-success' value='Valider'>
                            </div>
            
    </form>
          

            
            
                
  </div>

<!-- 
       <table class='table'>
  <thead>
    <tr>
      <th>Jour</th>
      <th>Ouverture</th>
      <th>Fermeture</th>
      <th>Activer</th>
    </tr>
  </thead>
  <tbody>
  
          <tr>
          <th scope='row'></th>
          <td></td>
          <td></td>
          <td></td>        

          
          </tr>
  
  


    
 
  </tbody>
</table> -->