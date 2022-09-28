<link rel="stylesheet" type="text/css" href="css/coach_style.css">
<head>
  <title>Coach DigitalSport</title>
  <meta http-equiv="Content-Type" content="text/HTML; charset=UTF-8" />
</head>
<header>

<div id="menu-name">
  <h1>🤾 Panel Coach 🤾</h1>
  <h1><?php echo $_SESSION['prenomcoach']?></h1>
</div>

<ul id="menu-header">
  <li class="menu-header-main-button"><a href="<?php echo get_url('coach','index')?>">Accueil Coach</a>
  </li>
  <li class="menu-header-main-button"><a href="<?php echo get_url('coach','show_exercise')?>">Exercices</a>
    <ul>
      <li><a href="<?php echo get_url('coach','add_exercise')?>">Ajouter</a></li>
    </ul>
  </li>
  <li class="menu-header-main-button"><a href="<?php echo get_url('coach','show_exercise_training')?>">Exercices Training</a>
    <ul>
      <li><a href="<?php echo get_url('coach','add_exercise_training')?>">Ajouter</a></li>
    </ul>
  </li>
  <li class="menu-header-main-button"><a href="<?php echo get_url('coach','update_material')?>">Matériel</a>
  </li>
  <li class="menu-header-main-button"><a href="<?php echo get_url('coach','informations')?>">Mon Profil</a>
    <ul>
      <li><a href="<?php echo get_url('coach','informations')?>">Mes informations</a></li>
      <li><a href="<?php echo get_url('connexion_coach','disconnect_coach')?>">Me déconnecter</a></li>
    </ul>
  </li>
</ul>



</header>
