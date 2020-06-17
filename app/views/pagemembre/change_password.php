<!--- CHANGE PASSWORD PAGE --->
<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_informations_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_change_password_style.css">
<script type="text/javascript" src="js/script.js"></script>

<!--- Success/error message --->
<h3>
    <?php

        if (isset($_COOKIE['cookie_success_message'])) {
          echo $_COOKIE['cookie_success_message'];
        } else if (isset($success_message)) {
          echo $success_message;
        } else if (isset($error_message)) {
          echo $error_message;
        } else if (isset($action_message)) {
          echo $action_message;
        }

    ?>
</h3>

<main>
      <br><br><br>
  <body>
    <form id="RegisterUserForm" action='<?php echo get_url('pagemembre','change_password_proceed') ?>' method="post">


        <div class="table-name">
          <h3>MOT DE PASSE 🔐</h3>
        </div>
        <table class="table-content">
            <thead>
                <tr>
                    <th colspan="2"><?php echo(($_SESSION['prenom'])." ".($_SESSION['nom'])); ?> </th>
                </tr>
            </thead>
            <tbody>
              <tr>
                    <td>Mot de passe actuel</td>
                    <td><input type="password" name="actual_password" id="actual_password" required ></td>
                </tr>
                <tr>
                    <td id="new_password_title">Nouveau mot de passe ❌</td>
                    <td><input type="password" name="new_password" id="new_password" onkeyup='check_new_password()' required ></td>
                </tr>

                <tr>
                    <td id="new_password_confirm_title">Confirmation ❌</td>
                    <td><input type="password" name="new_password_confirm" id="new_password_confirm" onkeyup='check_new_password()' required ></td>
                </tr>
            </tbody>
        </table>

        <br><br>

        <!--- MESSAGE AND BUTTON FOR JAVASCRIPT ONKEYUP --->
        <span id='message' class="bottom-text"></span>

        <br>

        <span id="button"></span>

        <br><br><br>

      </form>
  </body>
</main>
