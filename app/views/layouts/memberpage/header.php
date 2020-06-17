<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_index_style.css">

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour">🔰 Bonjour <?php echo $_SESSION['prenom']?> !</h2>
</div>

<ul id="menu-header">
  <li class="menu-header-main-button"><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Accueil Membre</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">Retour à l'accueil</a></li>
    </ul>
  </li>
  <li class="menu-header-main-button"><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Training</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=exercise_training">Je veux m'entraîner</a></li>
      <li><a href="#">Mes statistiques</a></li>
    </ul>
  </li>
  <li class="menu-header-main-button"><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Mon Profil</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=informations">Mes informations</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Mes abonnements</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=deconnexion_member">Me déconnecter</a></li>
    </ul>
  </li>
</ul>

</header>
