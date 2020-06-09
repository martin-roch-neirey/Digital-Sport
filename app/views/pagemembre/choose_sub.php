<h2>Mon Espace Virtuel</h2>
  <ul>

    <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index"">Accueil Membre</a><br>
    <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=deconnexion_member">Me déconnecter</a>
    <li>Mes statistiques</li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=informations">Mon compte</a></li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Mes abonnements</a></li>
    <li><a href="">Je veux m'entraîner</a></li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">Retour à l'accueil</a></li>

  </ul>
🔰 Bonjour <?php echo $_SESSION['prenom']?> ! Choisissez votre abonnement ici :
<br><br>


<main>
    <menu><h3>Pourquoi un système d'abonnement ?</h3>

            <article>🥇 En souscrivant une adhésion à notre salle de sport, vous contribuez à son développement.</article>
            <article>🏋️‍♀️ Vous accéderez à de nombreuses machines de qualité, nettoyées plusieurs fois par jour.</article>
            <article>🔰 Vous serez un membre officiel de DigitalSport, l'une des salles de sport les plus demandées en Europe.</article>

    </menu>


    <section><h3>L'abonnement START plus en détails :</h3>

         <form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_recap" method="post">

        <article>💓 Accès à la salle virtuelle et physique.</article>
        <article>💻 Vidéos de coaching en ligne.</article>
        <article>👬 Inviter un ami à la salle une fois par semaine !</article>
    <article>Obtenez-le pour 7.99€ / mois !</article>

    <input hidden name=reftypeabonnement value="1">
    <input hidden name=nomabonnement value="START">
    <input hidden name=prix value="7.99€ TTC">

    <button type="submit"> Choisir l'abonnement START </button>

    </form>


    </section>
    <section><h3>L'abonnement SPORT+ plus en détails :</h3>

        <form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_recap" method="post">

        <article>🔓 Tous les avantages de l'abonnement <span class="redcolor">START</span>.</article>
        <article>🤸‍♂️ Profitez de séances personnalisées exclusives, créées par des professionnels.</article>
        <article>💯 Accès prioritaire à la salle physique, limitée à 100 usagers pour votre confort.</article>
        <article>👬 Inviter un ami à la salle autant de fois que vous le voulez !</article>
    <article>Obtenez-le pour 19.99€ / mois !</article>

    <input hidden name=reftypeabonnement value="2">
    <input hidden name=nomabonnement value="SPORT+">
    <input hidden name=prix value="19.99€ TTC">

    <button type="submit"> Choisir l'abonnement SPORT+ </button>

    </section>
</main>
