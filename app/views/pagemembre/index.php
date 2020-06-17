<!--- Member main page --->

<main>

<br><br>
  <section>

      <h3>Panneau d'informations personnelles</h3>

      <br>
<!--- Success/error message after success/fail action --->
    <p>
        <?php

            if (isset($_COOKIE['cookie_success_message'])) {
              echo $_COOKIE['cookie_success_message'];
            } else if (isset($success_message)) {
              echo $success_message;
            } else if (isset($error_message)) {
              echo $error_message;
            } else if (isset($action_message)) {
              echo $action_message;
            } else {
              echo ("Vous n'avez pas de nouvelle information !");
            }

        ?>
    </p>

  </section>
  <br><br>


<p>Il faut trouver des choses à dire ici !</p>

</main>

