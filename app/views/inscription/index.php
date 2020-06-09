<!--- INDEX OF REGISTERING PAGE --->

<link rel="stylesheet" href="css/inscription_style.css">

<main>
    <menu>
        <section>
            <div>

                <!--- Check if success_message is set = after a failed register try --->
                <!--- Have a look in tentative_inscription in inscription.php in \mvc\app\controllers --->

                <?php if(isset($success_message)): ?>
                    <h3><?php echo $success_message?></h3>
                <?php endif; ?>

                <h3>Formulaire d'inscription</h3>

                <article>🔰 Ici, votre aventure parmis nous peut commencer dès à présent.
                Remplissez les champs demandés en vérifiant bien chaque information.
                DigitalSport s'engage à ne rendre publique aucune de vos données.

                <br><br>

                Nous respectons les lois européennes sur la protection des données personnelles. <a target="_blank" rel="noopener noreferrer" href="https://fr.wikipedia.org/wiki/R%C3%A8glement_g%C3%A9n%C3%A9ral_sur_la_protection_des_donn%C3%A9es">En savoir plus sur la RGPD.</a>
                </article>

            </div>

            <div>
<!---- DEBUG : <?php //print_r($data) ?> ----->


                <h3>S'inscrire</h3>

                     <!--- Form start --->

                    <form id="RegisterUserForm" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=inscription&action=tentative_inscription" method="post">
                    <fieldset>
                        <div>
                            <label for="nom">Nom</label> <input class="text" id="nom" type="text" name="nom" value="" minlenght="2" maxlength="100" required />
                            <label for="prenom">Prénom</label> <input class="text" id="prenom" type="text" name="prenom" value="" minlenght="2" maxlength="100" required/>
                            <label for="pseudo">Pseudonyme</label> <input class="text" id="pseudo" type="text" name="pseudo" value="" minlenght="2" maxlength="100" required/>
                            <label for="sexe" class="control-label">Sexe</label>
                                <select id="sexe" name="sexe">
                                    <option value="F">Femme</option>
                                    <option value="H">Homme</option>
                                    <option value="N">Neutre</option>
                                </select>
                            <label for="niveau" class="control-label">Niveau estimé</label>
                                <select id="niveau" name="refniveau">
                                        <option value="1">Débutant</option>
                                        <option value="2">Intermédiaire</option>
                                        <option value="3">Expert</option>
                                </select>
                            <label for="poids">Poids (kg)</label> <input class="text" id="poids" type="number" name="poids" value="0" min="0" max="300" required/>
                            <label for="taille">Taille (cm)</label> <input class="text" id="taille" type="number" name="taille" value="0" min="0" max="300" required/>
                            <label>Mot de passe
                                <input name="motdepasse" id="password" type="password" onkeyup='check()' minlenght="2" maxlength="100" required />
                            </label>
                        </div>

                        <div>
                            <label for="email">Email</label> <input class="text" id="email" type="email" name="mail" value="" minlenght="2" maxlength="100" required/>
                            <label for="ville">Ville</label> <input class="text" id="ville" type="text" name="ville" value="" minlenght="2" maxlength="100" required />
                            <label for="rue">Rue</label> <input class="text" id="rue" type="text" name="rue" value="" required />
                            <label for="numrue">Numéro</label> <input class="text" id="numrue" type="number" name="numrue" value="" minlenght="2" maxlength="100" required />
                            <label for="cp">Code Postal</label> <input class="text" id="cp" type="number" name="codepostal" value="" minlenght="2" maxlength="100" required />
                            <label for="dn">Date de naissance</label> <input class="text" id="dn" type="date" name="datenss" value="" required />

                            <!-------- PHONE --------->

                            <div id="divTel">

                                <label id="prefixTel" required>
                                    <?php
                                    print('<select name="refprefixetel">');
                                    foreach ($data[0] as $ligne) {
                                            print('<option value='.$ligne["idprefixetel"].'>'.$ligne["designationprefixetel"].'</option>');
                                            }
                                            print( "</select>");
                                                ?>
                                </label>
                                <label for="tel">Téléphone</label> <input class="text" id="tel" type="number" name="tel" value="" min="0" required/>

                            </div>

                            <!----------------------->

                            <label>Confirmation
                                <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check()' minlenght="2" maxlength="100" required />
                            </label>
                        </div>
                    </fieldset>

                        <br><br>

                        <span id='message'></span>

                        <br><br>

                        <input type="checkbox" name="acceptTerms" required />
                        <article name="acceptTerms" for="acceptTerms"> J'accepte les <a>termes et conditions</a> et j'autorise ce site à <a>conserver mes données  </a> transmises via ce formulaire.
                        </article>

                        <!-------- 2 Buttons -> Work in progress --------->

                        <button id="registerNew" type="button" class="form-submit-button" onclick='return btnClick();'>Confirmer mon inscription</button>
                        <button id="registerNew" type="submit" class="form-submit-button">Confirmer mon inscription</button>
                    </form>

                    <br>
            </div>
            <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion&action=index">J'ai déjà un compte.</a>
        </section>
    </menu>
</main>
