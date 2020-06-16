

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

