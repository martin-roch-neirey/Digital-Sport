<!--- INDEX OF REGISTERING PAGE --->

<?php

$temp = $data[0];

?>


<link rel="stylesheet" href="css/inscription_style.css">
<script type="text/javascript" src="js/script.js"></script>

<main>
    <menu>
        <section>
            <div>

                <!--- Check if success_message is set = after a failed register try --->
                <!--- Have a look in tentative_inscription in inscription.php in \mvc\app\controllers --->

                <?php if(isset($success_message)): ?>
                    <h3><?php echo $success_message?></h3>
                <?php endif; ?>

                <h3>Formulaire d'inscription 💪</h3>

                <article>🔰 Ici, votre aventure parmis nous peut commencer dès à présent.
                <br><br>

                Nous respectons les lois européennes sur la protection des données personnelles. <a target="_blank" rel="noopener noreferrer" href="https://fr.wikipedia.org/wiki/R%C3%A8glement_g%C3%A9n%C3%A9ral_sur_la_protection_des_donn%C3%A9es">En savoir plus sur la RGPD.</a>
                </article>

            </div>

            <div>

                <!---- DEBUG : <?php //print_r($data) ?> ----->

                <h3>S'inscrire</h3>

                     <!--- Form start --->

                    <form id="RegisterUserForm" action='<?php echo get_url('inscription','tentative_inscription') ?>' method="post">
                    <fieldset>
                        <div>
                            <label for="nom">Nom</label> <input class="text" id="nom" type="text" name="nom" minlenght="1" maxlength="20" required />
                            <label for="prenom">Prénom</label> <input class="text" id="prenom" type="text" name="prenom" minlenght="1" maxlength="20" required/>
                            <label for="pseudo">Pseudonyme</label> <input class="text" id="pseudo" type="text" name="pseudo" minlenght="1" maxlength="20" required/>
                            <label for="sexe" class="control-label">Sexe</label>
                                <select id="sexe" name="sexe">
                                    <option value="F">Femme</option>
                                    <option value="H">Homme</option>
                                    <option value="N">Neutre</option>
                                </select>
                            <label for="niveau" class="control-label">Niveau estimé</label>
                                <?php
                                    print('<select name="refniveau">');
                                    foreach ($temp[1] as $ligne) {
                                            print('<option value='.$ligne["idniveau"].'>'.$ligne["nomniveau"].'</option>');
                                            }
                                            print( "</select>");
                                                ?>
                            <label for="poids">Poids (kg)</label> <input class="text" id="poids" name="poids" value="0" min="0" max="300" pattern="[0-9]{1,3}" title="ex : 75" required/>
                            <label for="taille">Taille (cm)</label> <input class="text" id="taille" name="taille" value="0" min="0" max="300" pattern="[0-9]{1,3}" title="ex : 180" required/>
                            <label>Mot de passe
                                <input name="motdepasse" id="password" type="password" onkeyup='check_password()' minlenght="1" maxlength="50" required />
                            </label>
                        </div>

                        <div>
                            <label for="email">Email</label> <input class="text" id="email" name="mail" minlenght="1" maxlength="255" pattern="([a-zA-Z0-9._-]{1,200})\@([a-zA-Z0-9._])+\.([a-zA-Z]){2,4}" title="ex : manon.dupont@gmail.com" required/>
                            <label for="ville">Ville</label> <input class="text" id="ville" type="text" name="ville" minlenght="1" maxlength="50" required />
                            <label for="rue">Rue</label> <input class="text" id="rue" type="text" name="rue" required />
                            <label for="numrue">Numéro</label> <input class="text" id="numrue" type="number" name="numrue" minlenght="1" maxlength="8" required />
                            <label for="cp">Code Postal</label> <input class="text" id="cp" name="codepostal" minlenght="5" maxlength="5" pattern="[0-9]{5}" title="ex : 75000" required />
                            <label for="dn">Date de naissance</label> <input class="text" id="dn" type="date" name="datenss" required />

                            <!-------- PHONE --------->

                            <div id="divTel">

                                <label id="prefixeTel" required>
                                    <?php
                                    print('<select name="refprefixetel">');
                                    foreach ($temp[0] as $ligne) {
                                            print('<option value='.$ligne["idprefixetel"].'>'.$ligne["designationprefixetel"].'</option>');
                                            }
                                            print( "</select>");
                                                ?>
                                </label>
                                <label for="tel">Téléphone</label> <input class="text" id="tel" name="tel" minlength="6" maxlength="13" title="ex : 677889900" pattern="[0-9]{6,13}" required/>

                            </div>

                            <!----------------------->

                            <label>Confirmation
                                <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check_password()' minlenght="1" maxlength="50" required />
                            </label>
                        </div>
                    </fieldset>
                    <br><br>

                    <section id="bottom-form">
                        <span id='message'></span>

                        <br><br>

                        <label class="container">

                            <input type="checkbox" name="acceptTerms" required />

                            <span class="checkmark"></span>

                        </label>

                        <article name="acceptTerms" for="acceptTerms"> J'autorise ce site à conserver mes données transmises via ce formulaire.
                        </article>



                        <br><br>

                        <!---- BUTTON IN SCRIPT.JS ---->
                            <span id="button"></span>
                    </section>

                        <br><br><br>
                    </form>


                    <a class="bottom-link" href='<?php echo get_url('connexion','index') ?>'>J'ai déjà un compte.</a>

            <a class="bottom-link" href='<?php echo get_url('home','index') ?>'>Retour à l'accueil.</a>
            </div>

        </section>
    </menu>
</main>
