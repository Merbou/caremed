
  <nav class="navbar navbar-expand  bg-dark fixed-top ">

<a class="navbar-brand mr-1 text-light" href="index.php">
<?php echo "Mr ". ucfirst($medecin['name'])." ". ucfirst($medecin['firstName'])?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav mt-2">
  



<li class="nav-item">
    <a class="nav-link" href="index.php?url=recherche">
  <span class="text-light active">Rechercher votre patient</span></a>
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


    <form class="row mt-3" method="post" action="" id="form">
    
                                    
                            <div class="form-group col-12">
                                <label for="titre_ordo" >Titre d'Ordonnance:</label>
                                <input type="text" name="titre_ordo" class="form-control
                                    <?php 
                                            echo empty($errors['titre_ordo'])?'':'is-invalid'
                                        ?>"
                                    id="titreOrdo"
                                placeholder="titre d'Ordonance">      
                                
                                              <div class='invalid-feedback'>
                                                        <?php echo $errors['titre_ordo'] ?>
                                              </div> 
                            
                            </div>
                        
                            <div class="form-group col-3" id="champ_nom" value="0">
                                <label for="nom_medi" >nom de Médicament:</label>
                                <input type="text" name="nom_medi[]" class="form-control
                                    <?php 
                                            echo empty($errors['nom_medi'])?'':'is-invalid'
                                        ?>"
                                    id="nom_medi"
                                placeholder="Le nom de Médicament">      
                                
                                              <div class='invalid-feedback'>
                                                        <?php echo $errors['nom_medi'] ?>
                                              </div> 
                            
                            </div>
                        
                            <div class="form-group col-6" id="champ_descrip">
                                <label for="descrip_medi" >Description sur le Médicament:</label>
                                <input type="text" name="descrip_medi[]" class="form-control"
                                    id="descrip_medi"
                                placeholder="Description sur le Médicament">      
                                
                                             
                            
                            </div>
                        
                            <div class="form-group col-3" id="champ_qnt">
                                <label for="qnt_medi" >la quantité de Médicament:</label>
                                <input type="number" name="qnt_medi[]" class="form-control"
                                    id="qnt_medi"
                                placeholder="la quantité de Médicament">      

                            </div>
                        
                        
                        
                            <div class="form-group col-3 " id="insertMore" style="margin-top: 10px;">
                                <input type="button"  class=" btn btn-block  btn-secondary" onclick="ajouteLigne()" value="Ajouter plus des medecaments">
                            </div>

                        <div class="form-group col-12  " >
                                <input type="submit" class=" btn btn-block  btn-success" value="Valider l'Ordonnance">
                            </div>
            
    </form>

</div>


<script> 
        function ajouteLigne(){
            var 
            champ_nom = document.getElementById("champ_nom").cloneNode(true),
            champ_descrip = document.getElementById("champ_descrip").cloneNode(true),
            champ_qnt = document.getElementById("champ_qnt").cloneNode(true),
            insertMore=document.getElementById("insertMore");



            document.getElementById("form").insertBefore(champ_nom,insertMore)

            document.getElementById("form").insertBefore(champ_descrip,insertMore)

            document.getElementById("form").insertBefore(champ_qnt,insertMore)

            // document.getElementById("form").appendChild(champ_nom); 
            // document.getElementById("form").appendChild(champ_descrip); 
            // document.getElementById("form").appendChild(champ_qnt); 

    

        }
</script>