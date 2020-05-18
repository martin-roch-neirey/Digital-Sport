<!DOCTYPE html>
<html>
<head>
	<title>DigitalSport</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_asset('css/header_style.css') ?>">
	<script type="text/javascript" src="<?php echo get_asset('js/header_script.js') ?>"></script>
	<meta http-equiv="Content-Type" content="text/HTML; charset=UTF-8" />
</head>
<body>
	<!-- Header -->
	<header>
		<div id="header"></div> <!-- Id pour javascript -->
		<nav>
		    <ul>
			    <li onclick="goToAcc()">
			    	<a id="logo">
			    		<img src="<?php echo get_asset('images/haltere.png') ?>" alt="haltere"/>
			    			DigitalSport
			    		<img src="<?php echo get_asset('images/haltere_reverse.png') ?>" alt="haltere"/>
			    	</a>
			    </li>
			    <li onclick="goToEntmnt()">ENTRAINEMENTS</li>
			    <li onclick="goToAbo()">ABONNEMENTS</li>
			    <li><a href="<?php echo get_url('profil') ?>">PROFIL</a></li>
			    <li onclick="goToCont()">CONTACT</li>
		     </ul>
	    </nav>
	</header>