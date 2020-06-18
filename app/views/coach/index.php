<!--- Member main page --->
<link rel="stylesheet" type="text/css" href="css/coach_index_style.css">
<link rel="stylesheet" type="text/css" href="css/coach_style.css">

<main>
 <br><br>
<menu class="menu">

  <body>



    <?php
      echo '<h3 class="presentation_message title-menu">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
      if (isset($error_message)){
        echo '<h4 class="error_message">'.$error_message.'</h4>' ;
      }
      if (isset($success_message)){
        echo '<h4 class="success_message">'.$success_message.'</h4>' ;
      }

    ?>
    <table class="table-content"> <!-- show result: list stats with a tab -->
      <?php
      foreach ($data as $tab) {
        if (is_array($tab)){
          foreach ($tab as $tableau) {
            if (is_array($tableau)){
              foreach ($tableau as $ligne) {
                $count=$ligne["count"];
                echo "<tr class='index_stats'>
                    <td> ".$tab[0]."</td>
                    <td> ".$count."</td>
                      </tr>";
              }
            }
          }
        }
      }
      ?>
    </table>

  <br>
</body>
</menu>

<br><br>

</main>

