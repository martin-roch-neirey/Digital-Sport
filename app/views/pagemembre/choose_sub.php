<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_choosesub_style.css">

<main>

<br><br><br><br>

    <menu class="menu">
      <h3 class="title-menu">Pourquoi un système d'abonnement ?</h3>

            <article class="article-menu">🥇 En souscrivant une adhésion à notre salle de sport, vous contribuez à son développement.</article>
            <article class="article-menu">🏋️‍♀️ Vous accéderez à de nombreuses machines de qualité, nettoyées plusieurs fois par jour.</article>
            <article class="article-menu">🔰 Vous serez un membre officiel de DigitalSport, l'une des salles de sport les plus demandées en Europe.</article>

    </menu>

<br><br>
<!-- Tableau -->
    <div class="pricing-wrapper clearfix">
        <!-- Titre Tableau -->
        <h1 class="pricing-table-title">Nos abonnements <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">DigitalSport</a></h1>

        <!-- START formulaire -->

        <form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_recap" method="post">

           <input hidden name=reftypeabonnement value="1">
           <input hidden name=nomabonnement value="START">
           <input hidden name=prix value="7.99€ TTC">

        <div class="pricing-table recommended">
            <h3 class="pricing-title">START</h3>
            <div class="price">7.99€<sup>/ mois</sup></div>
            <!-- Caractéristiques START -->
            <ul class="table-list">
                <li>💓 Accès à la salle <span> virtuelle et physique.</span></li>
                <li>💻 Vidéos <span>Vidéos de coaching en ligne.</span></li>
                <li>👬 Invitez un ami <span> à la salle de sport physique une fois par semaine !</span></li>
                <li>Espace personnel <span class="unlimited">ILLIMITÉ !</span></li>
            </ul>
            <!-- Choisir -->
            <div class="table-buy">
                <p>7.99€<sup>/ mois</sup></p>

                <button type="submit" class="pricing-action"> Choisir </button>

            </div>
        </div>
        </form>

        <!-- SPORT + formulaire -->

        <form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_recap" method="post">

          <input hidden name=reftypeabonnement value="2">
          <input hidden name=nomabonnement value="SPORT+">
          <input hidden name=prix value="19.99€ TTC">


        <div class="pricing-table">
            <h3 class="pricing-title">SPORT +</h3>
            <div class="price">19.99€<sup>/ mois</sup></div>
            <!-- Caractéristiques SPORT + -->
            <ul class="table-list">
                <li>🔓 Tous les avantages START</li>
                <li>🤸‍♂️ Séances personnalisées exclusives</li>
                <li>💯 Accès prioritaire<span> à la salle physique, limitée à 100 usagers pour votre confort.</span></li>
                <li>👬 Inviter un ami à la salle <span class="unlimited">ILLIMITÉ !</span></li>
            </ul>
            <!-- Choisir -->
            <div class="table-buy">
                <p>19.99€<sup>/ mois</sup></p>
                <button type="submit" class="pricing-action"> Choisir </button>
            </div>
        </div>
        </form>
    </div>
<br><br><br><br><br><br><br><br>

</main>
