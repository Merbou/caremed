
  <nav class="navbar navbar-expand  bg-dark  fixed-top">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Dr ". ucfirst($medecin['name'])." ".ucfirst($medecin['firstName'])
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





<div class="row ml-3">
<div class="mt-5  col-lg-6  offset-lg-2" >
<div class='card'>
<div class='card-header'>
               <?php echo  "MR ". ucfirst($dossier['patient_Name'])." ".ucfirst($dossier['patient_FirstName'])?>
                </div>
<?php foreach( $Resultats as $Resultat)
        echo "
               
      
                <ul class='list-group'>
                  <li class='list-group-item'>".$Resultat['descrip_resultat']."
                
                  <a class='float-right' href=".$Resultat['path_file']." download>Telecharger</a></li>
                  </ul>
                ";
        ?>
        <div class='card-footer'>
        <form class="row mt-3" method="post" action="" >
                
        <input type="hidden" name="examForm" value="exam"/>
                <div class="form-group col-10">
        
                  <input type="text" name="descrip_resultat" class="form-control
                  <?php 
										echo empty($errors['descrip'])?'':'is-invalid'
										?>"
                     id="descrip_resultat"
                  placeholder="descrip_resultat">      
                  
                  <div class='invalid-feedback'>
											<?php echo $errors['descrip'] ?>
											</div> 
                  
              </div>
              <div class="form-group col-2">
                    <input type="submit" class="btn  btn-success" value="Send">
                </div>

         </form>
          </div>
        </div>

                
  </div>

<div class="mt-5 col-lg-4" >
<div class="chat pl-3 " style="overflow-y:scroll;" >
<?php 
foreach($messages as $message){
  echo ($message['user_out']==$dossier['patient_id'])? 
  " <div > <p >".$dossier['patient_Name'].": </p>
  <p class='bg-secondary pl-3 ' 
  style='border-radius:50px;word-break: break-all; 
    width: 50%;
  font-size:13px'>".$message['message']."</p>
  </div>":
  "<div ><p>Me :</p>
  <p class='bg-info pl-3 ' 
  style='border-radius:50px;word-break: break-all; 
    width: 50%;
  font-size:13px'>".$message['message']."</p>
  </div>";
}
?>

</div>
    
  <form class="col-10  " action="" method="post">
    <div class="row">
    <input type="hidden" name="messageForm" value="message"/>

    <input type="text" class=" col-8 ml-2 form-control 
    <?php echo empty($errors['message'])?'':'is-invalid'
										?>" name="message" id="message">
      
                  
    <input type="submit"  class="col-2 btn btn-success" value="send">
    </div>
  </form>              
        
  </div>