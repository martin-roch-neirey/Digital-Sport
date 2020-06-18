<?php

function getRandomGif($topic = 'fail') { // giphy API for a random gif "fail"

   $gif = json_decode(file_get_contents('http://api.giphy.com/v1/gifs/random?api_key=dc6zaTOxFJmzC&tag='.$topic), true);

   return $gif['data']['image_url'];

}

// Generate a link
$linkgif = getRandomGif();

?>

<!-------- HTML ----------->
<main>

    <div>

      <img src="images/haltere" alt="">

      <h1>Oops ! Il semblerait que vous soyez perdu...</h1>
      <h3>Code d'erreur : 404</h3>
      <br>
      <h2>Pas de panique ! Retournez vous entraîner en cliquant <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">ici</a> !</h2>
      <br>
      <h3>🔰 (Vous pouvez tout également vous détendre sur cette magnifique page...)</h3>
      <!-- GIF -->
      <img src=<?php echo $linkgif ?>>

    </div>

</main>

<!-------- CSS ------------>
<style>

  html {
    width: 100%;
    min-height: 120vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 0px;
    margin: 0px;
    background-image: url("images/background_pink");
    text-align: center;
    color : white;
  }

</style>