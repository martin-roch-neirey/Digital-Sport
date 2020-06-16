  <link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
  <link rel="stylesheet" type="text/css" href="css/pagemembre_index_style.css">

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour">🔰 Bonjour <?php echo $_SESSION['prenom']?> !</h2>
  <h3>Accueil Membre</h3>
</div>

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

<main>

<br><br>
  <section>

      <h3>Panneau d'informations personnelles</h3>
      <br>

    <?php if(isset($success_message)): ?>
            <p><?php echo $success_message?></p> <br>
    <?php endif; ?>
    <?php if(isset($error_message)): ?>
            <p><?php echo $error_message?></p> <br>
    <?php endif; ?>
    <?php if(isset($action_message)): ?>
            <p><?php echo $action_message?></p> <br>
    <?php endif; ?>

    <?php if(isset($success_message) == false): ?>
      <p><?php echo("Vous n'avez pas de nouvelle information !")?></p> <br>
    <?php endif; ?>

  </section>
  <br><br>


<p>Il faut trouver des choses à dire ici !</p>

</main>

<footer>

    <h2>&copy; DigitalSport, 2020</h2>

</footer>

