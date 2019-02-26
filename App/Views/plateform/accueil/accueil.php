<?php
 $this->link= "<link rel='stylesheet' type='text/css' href='public/styles/homeCss.css'>" ?>

<?php
$this->script= "<script src='public/js/jsHome.js'></script>"?>


<?php if(!empty($News)) echo 
  "<div class='news navbar fixed-bottom bg-danger text-light '>News:".$News['text']."</div>"
  ?>

<div align="right">
  
  <div  class="rounded-left DivNavImage">

  </div>
</div>
  
  <div align="right" class="logoPosition"> 


<form action="">
  
  <input type="image" src="public/img/nav/lg1.png" alt="Submit" >
</form>


    </div>

<div >

<br><br><br>

<div align="right" class="container-fluid">
  <br><br><br><br>
    <div id="swapper-first" align="right"  class="display-block bleuTop shadow p-3 mb-5  rounded" 


      <div><br><br><br> <h1 class="textBienVenu">Bienvenue à votre cabinet !</h1>

        <p class="textSlogan font-italic"> " Acquérez L'information Pour Une Santé Au Top " </p>
        <p>Utilisez votre compte pandant votre suivie . Soyez en cours au instruction de  votre médecin</p>
      <div align="center"><button class="btn btn-light" > <a href="index?url=login">Accéder à votre éspace !</a></button> </div>
      </div>
    </div>

</div>

<br><br><br>
<div class="ecritureHoraires">Horaires de travails</div>
<br><br>



<div class="container-fluid">
  <div align="align" class=" shadow p-3 mb-5  rounded sliderReception imageHoraire"> </div>
  <br><br><br>
  <div class="shadow p-3 mb-5  rounded tableHoraires" >
    <br><br>
    <table class="table table-sm">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Jour</th>
      <th scope="col">Heure Ouverture</th>
      <th scope="col">Heure Fermiture</th>
    </tr>
  </thead>
  <tbody>

<?php 
 for($i=0;$i<6;$i++){
   if(!$Horaires[$i]['active'])
   echo "   <tr>
   <th scope='row'></th>
   <td>".$Horaires[$i]['jour']."</td>
   <td>Férier</td>
   <td>Férier</td>
 </tr>
";
else

   echo "   <tr>
      <th scope='row'></th>
      <td>".$Horaires[$i]['jour']."</td>
      <td>".$Horaires[$i]['h_ouverture']."h</td>
      <td>".$Horaires[$i]['h_fermeteur']."h</td>
    </tr>
   ";}
?>
    <tr>
      <th scope="row"></th>
      <td>Vendredi</td>
      <td>Férier</td>
      <td>Férier</td>
    </tr>
  </tbody>
</table>

  </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div > <h1 class="ecritureHoraires">Notre Equipe de Médecins </h1></div>
<br>
<div class="container-fluid"> 
              <table class="table-width">
                       
                         <td><img width="400" class="rounded-right imgOppacity" src="https://st2.depositphotos.com/1006318/5909/v/950/depositphotos_59095203-stock-illustration-medical-doctor-profile.jpg"></td>
                         <td><img width="400" src="https://st2.depositphotos.com/1006318/5909/v/950/depositphotos_59095203-stock-illustration-medical-doctor-profile.jpg"></td>
                         <td><img  width="400" class="rounded-left imgOppacity" src="https://st2.depositphotos.com/1006318/5909/v/950/depositphotos_59095203-stock-illustration-medical-doctor-profile.jpg"></td>
                       </tr>
                       <tr>

                       
                        <?php 
                         for($i=0;$i<3 && $i<count($comptes);$i++){

                        echo "
                        <td><b>Docteur ".$comptes[$i]['nom']." ".$comptes[$i]['prenom']."
                         </b><br>Médecin ".$comptes[$i]['type_soin']."</td>";
                         }?>
                        
                       </tr>
                       <tr>
                        <td></td><td></td>
                       </tr>
              </table> 
</div>


<br>
<div > <h2 class="ecritureHoraires">Spécialités Traitées </h2></div>
<br>

<div class="container">
  <table class="table table-hover">
  <thead>
    <tr>
      <th class="table-primary" scope="col"></th>
      <th class="table-primary" scope="col">Spécialité</th>
      <th class="table-primary" scope="col">Médecin Résponsable</th>
    </tr>
  </thead>
  <tbody>
  <?php 
 for($i=0;$i<10 && $i<count($comptes);$i++){
   echo "   <tr>
   <th scope='row'></th>
   <td>".$comptes[$i]['type_soin']."</td>
   <td>".$comptes[$i]['nom']." ".$comptes[$i]['prenom']."</td>
 </tr>
";}
?>


  </tbody>
</table>
</div>



<div class="footerTraitement "> 

<div class="container">
  <br>
  <table class="table-width">

  <tr>
    <th><a class="ecritureFooter"  href="#"> CABINET BOUMEGHAZ</a></th>
    <th><a class="ecritureFooter" href="">Produits</a></th>
    <th><a class="ecritureFooter" href="">Companie</a></th>
    <th><a class="ecritureFooter"  href="">Réseau Sociaux</a></th>

  </tr>

  <tr>
    <td><a class="ecriturelinks" href="">Questions</a></td>
    <td><a class="ecriturelinks" href="">Equipe</a></td>
    <td><a class="ecriturelinks" href="">à propos</a></td>
    <td><a  class="ecriturelinks" href="viewSocialMedia/blog.html">blog</a> <a class="ecriturelinks" href="viewSocialMedia/facebook.html">Facebook</a> <a class="ecriturelinks" href="viewSocialMedia/twitter.html">Twitter</a> <a class="ecriturelinks" href="viewSocialMedia/linkedin.html">Linkedin</a></td>
  </tr>
  
  <tr>
    <td><a class="ecriturelinks" href="">Help</a></td>
    <td><a class="ecriturelinks" href="">Engagement</a></td>
    <td><a class="ecriturelinks" href="">Politique de confidentialité</a></td>
    <td><a class="ecriturelinks" href=""></a></td>
  </tr>

  <tr>
    <td><a class="ecriturelinks" href="">Mobile</a></td>
    <td><a class="ecriturelinks" href="">Entreprise</a> </td>
    <td><a class="ecriturelinks" href="">Contactez-nous</a></td>
    <td><a class="ecriturelinks" href=""></a></td>
  </tr>

</table>

    <br>
        <p class="ecritureLast">conception du site / logo © 2019  contributions utilisateur sous licence cc by-sa 3.0 avec attribution requise. réf 2019.2.20.32912 / Copyright© 2019</p>
    <br>

</div>
</div>


