<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour"><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></h2>
  <h3>🔰 Abonnements 🔰</h3>
</div>
</nav>

<ul id="menu-header">
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Accueil Membre</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">Retour à l'accueil</a></li>
    </ul>
  </li>
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Training</a>
    <ul>
      <li><a href="#">Je veux m'entraîner</a></li>
      <li><a href="#">Mes statistiques</a></li>
    </ul>
  </li>
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Mon Profil</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=informations">Mes informations</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Mes abonnements</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=deconnexion_member">Me déconnecter</a></li>
    </ul>
  </li>
</ul>

</header>
<br><br>


<h1>Votre nouvel abonnement vous a été livré !</h1>

<h2>Consultez vos abonnements actuels en cliquant <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">ici</a>.</h2>
