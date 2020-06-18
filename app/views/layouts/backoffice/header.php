<!DOCTYPE html>
<html>
<head>
	<title>Admin DigitalSport</title>
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<meta http-equiv="Content-Type" content="text/HTML; charset=UTF-8" />
</head>
<body>
<!-- Header -->
	<header>
		<nav>
		    <ul>
			    <li>
			    	<a href=<?php echo get_url('admin','index') ?> >Tableau de bord</a>
			    </li>
			    <li class="listeli">Coach
			    	<ul>
			    		<li>
			    			<a href=<?php echo get_url('admin','show_all_coachs_profile') ?> >Profils</a>
			    		</li>
			    		<li>
			    			<a href=<?php echo get_url('admin','add_coach') ?> >Ajouter</a>
			    		</li>
			    		<li>Séances</li>
			    	</ul>
			    </li>
			   	<li class="listeli">Client
			   		<ul>
			   			<li>
			   				<a href=<?php echo get_url('admin','show_all_clients_profile') ?> >Profils</a>
			   			</li>
			   			<li>Séance Coach</li>
			   			<li>Séance Perso</li>
			   		</ul>
			   	</li>
			    <li>
			    	<a href=<?php echo get_url('admin','show_exercise_training') ?> >Exercices d'entrainement</a>
			    </li>
			    <li>
			    	<a href=<?php echo get_url('admin','show_contact_message') ?> >Message contact</a>
			    </li>
			    <li>
					<a href=<?php echo get_url('admin','show_exercise') ?> >Exercice</a>
			    </li>
			    <li>
			    	<a href=<?php echo get_url('admin','update_material') ?> >Matériel</a>
			    </li>
			    <li>
			    	<a href=<?php echo get_url('admin','show_resource_graph') ?> >Ressources</a>
			    </li>
			    <li>
			    	<a href=<?php echo get_url('admin','show_changelog') ?> >Changelog</a>
			    </li>
			    <li>
			    	<a target='blank' href=<?php echo get_url('home','index') ?> >Retour au site</a>
			    </li>
		     </ul>
	    </nav>
	</header>