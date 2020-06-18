<!--- Member main page --->

<main class='main-index'>

<br><br>
  <section class='menu'>

      <h3>📋 Informations 📋</h3>

      <br>
<!--- Success/error message after success/fail action --->
    <p>
        <?php
          echo "<li class='li-infos'>";
            if (isset($_COOKIE['cookie_success_message'])) {
              echo $_COOKIE['cookie_success_message'];
            } else if (isset($success_message)) {
              echo $success_message;
            } else if (isset($error_message)) {
              echo $error_message;
            } else if (isset($action_message)) {
              echo $action_message;
            } else {
              echo ("Votre nouvelle salle physique sera ouverte à partir du 22 juin ! Un masque DigitalSport et du gel hydroalcoolique seront mis à votre disposition. Les mesures barrières devront être respectées par l'ensemble de nos membres.</li>

                <li class='li-infos'>
                  Les nouvelles machines d'exercices sont arrivées !
                </li>
                <li class='li-infos'>
                  De nouveaux exercices sont apparus dans l'onglet Training ! 😱
                </li>
                ");
            }
          echo "</li>"

        ?>
    </p>

  </section>
  <br><br>

  <section>

    <br>

    <p>


      <?php

        if ($_SESSION['Sub'] != null) {


          echo "
          <table class='table-content'>
              <thead>
                  <tr>
                      <th colspan='2'>Statistiques 📈</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                      <td>Nombre de séances suivies</td>
                      <td class='digital-font'>";
                        print_r($data[1][0]['count']);
                      echo "</td>
                  </tr>
                  <tr>
                      <td>Nombre d'exercices effectués</td>
                      <td class='digital-font'>";
                        print_r($data[2][0]['count']);
                      echo "</td>
                  </tr>
                  <tr>
                      <td>IMC</td>
                      <td class='digital-font'>";
                        print_r($data[0]);
                      echo "</td>
                  </tr>
              </tbody>
          </table>
          <br><br>
          ";

          echo "
            <p>

              <br>

              Notice : <br><br>Votre Indice de Masse Corporelle (abréviation IMC) est une grandeur qui permet d'estimer votre corpulence. Il se calcule en fonction de votre taille et de votre masse corporelle. <br><br> Les valeurs 18 et 25 constituent des repères communément admis pour un IMC normal et présentant donc un rapport de risque jugé acceptable. Vous pouvez observer le graphique ci-dessous pour définir votre corpulence estimée.

              <br><br><br>

              <img width='640' height='360' src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/BMI_grid_fr.svg/1200px-BMI_grid_fr.svg.png'>

              <br><br><br>

              Votre IMC est supérieur à 25 ? Ne vous découragez pas ! Poursuivez votre entraînement avec une forte détermination et cette valeur diminuera au fil des séances. Parole de Coach !

              <br><br><br>

          ";
              } else {
                echo "Vos Statistiques ne sont disponibles que lorsque vous souscrivez à un abonnement.";
              }
          echo "</p>";

      ?>
     </p>
  </section>
  <br><br>
</main>

