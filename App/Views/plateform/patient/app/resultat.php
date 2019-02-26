
  <nav class="navbar navbar-expand  bg-dark fixed-top mb-5 ">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Patient ". ucfirst($patient['name'])." ".ucfirst($patient['firstName'])
?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-5">
  



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





<div class="row ml-3 pt-5">
<div class="mt-5  col-lg-6  offset-lg-2 " >
<div class='card'>
<div class='card-header'>
               <?php echo  "MR ". ucfirst($dossier['medecin_Name'])." ".ucfirst($dossier['medecin_FirstName'])?>
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
        <form class="row mt-3" method="post" action="" enctype="multipart/form-data" >
                
        <input type="hidden" name="examForm" value="exam"/>
                <div class="form-group col-8">
        
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
              
              <div class="form-group col-4">
        
                  <input type="file" name="file" class="form-control
                  <?php 
										echo empty($errors['file'])?'':'is-invalid'
										?>"
                     id="descrip_resultat"
                  placeholder="descrip_resultat">      
                  
                  <div class='invalid-feedback'>
											<?php echo $errors['file'] ?>
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
  echo ($message['user_out']==$dossier['medecin_id'])? 
  " <div > <p >".$dossier['medecin_Name'].": </p>
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