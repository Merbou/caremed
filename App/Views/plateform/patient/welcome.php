
  <nav class="navbar navbar-expand  bg-dark  ">

<a class="navbar-brand mr-1 text-light" href="index.php"><?php echo "Patient ". ucfirst($name)." ". ucfirst($firstName)?></a>


<!-- Navbar -->

</nav>

<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav ">
  



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