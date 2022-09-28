	<link rel="stylesheet" type="text/css" href="css/index.css">
	<div id="partie1" class="divpartie">
		<div>
			<h1>Bienvenue dans notre <span>Salle de Sport Virtuelle</span> !</h1>
			<div id="textexp">

				<?php if(isset($success_message)): ?>
 						<h3><?php echo $success_message?></h3>
 					<?php endif; ?>
 					<?php if(isset($deconnexion_message)): ?>
 						<h3><?php echo $deconnexion_message?></h3>
 					<?php endif; ?>


				<p>Faites des exercices chez vous pour renforcer vos muscles et atteignez vos objectifs.</p>
				<p>Seul(e) ou suivi(e) par un Coach, faites des entraînements qui vous correspondent.</p>
				<p>Inscrivez-vous et bénéficiez de cette expérience unique !</p>
			</div>
		</div>
		<img class="imageronde" src="<?php echo get_asset('images/warmup.jpg') ?>" alt="warmup"/>
		<div id="styleimg1"></div>
		<div id="styleimg2"></div>
	</div>
	<!-- Partie 2 -->
	<div id="partie2" class="divpartie">
		<div>
			<div>
				<img src="<?php echo get_asset('images/icon1.png') ?>" alt="icon1"/>
				<h3>Des exercices faciles à réaliser chez soi</h3>
			</div>
			<div>
				<img src="<?php echo get_asset('images/icon2.png') ?>" alt="icon2"/>
				<h3>Un suivi par des coachs compétents</h3>
			</div>
			<div>
				<img src="<?php echo get_asset('images/icon3.png') ?>" alt="icon3"/>
				<h3>Des abonnements complets</h3>
			</div>
		</div>

		<!--Corps Partie 2 -->
		<div id="corps">
			<div id="bandeau1">
				<img class="imageronde" src="<?php echo get_asset('images/work_home.jpg') ?>" alt="work_home"/>
				<h3>Vous pouvez librement réaliser des exercices chez vous, à votre rythme pour garder la forme. Vous avez la possibilité de sélectionner le muscle, le matériel et le type de musculation pour évoluer suivant vos envies. Ces entraînements sont uniques : vous êtes votre propre entraîneur !
					<br/><br/>
					<a href=<?php echo get_url('pagemembre','abonnements') ?>>Je pars m'entraîner !</a>
				</h3>
			</div>
			<div id="bandeau2">
				<img class="imageronde" src="<?php echo get_asset('images/work_room.jpg') ?>" alt="work_room"/>
				<h3>Vous pouvez opter pour un suivi par un coach en salle. Vous vous entrainerez en suivant ses directives durant la séance, ils sont des motivateurs exceptionnels et vous poussent à performer et à dépasser vos limites. Inscrivez vous en amont pour profiter de ces séances !
					<br/><br/>
					<a href=<?php echo get_url('pagemembre','abonnements') ?>>Je réserve ma séance !</a>
				</h3>
			</div>
		</div>
		<h1>ABONNEMENTS</h1>
	</div>
	<!-- Partie 3 -->
	<div id="partie3" class="divpartie">
	    <div>
	    	<h3>Pourquoi un système d'abonnement ?</h3>
	        <div>🥇 En souscrivant une adhésion à notre salle de sport, vous contribuez à son développement.</div>
	        <div>🏋️‍♀️ Vous accéderez à de nombreuses machines de qualité, nettoyées plusieurs fois par jour.</div>
	        <div>🔰 Vous serez un membre officiel de DigitalSport, une salle représentative de la vision future du sport.</div>
	    </div>
	    <div>
	    	<h3>L'abonnement START en détail :</h3>
	        <div>💓 Accès à la salle virtuelle et physique.</div>
	        <div>💻 Vidéos de coaching en ligne.</div>
	        <div>👬 Inviter un ami à la salle une fois par semaine !</div>
	    	<div>Obtenez-le pour <a href=<?php echo get_url('pagemembre','abonnements') ?> >7.99€ / mois</a> !</div>
	    </div>
	    <div>
	    	<h3>L'abonnement SPORT+ en détail :</h3>
	        <div>🔓 Tous les avantages de l'abonnement <span>START</span>.</div>
	        <div>🤸‍♂️ Profitez de séances personnalisées exclusives, créées par des professionnels.</div>
	        <div>👬 Inviter un ami à la salle autant de fois que vous le voulez !</div>
	    	<div>Obtenez-le pour <a href=<?php echo get_url('pagemembre','abonnements') ?> >19.99€ / mois </a> !</div>
	    </div>
	</div>
	<script type="text/javascript" src="js/index.js"></script>
