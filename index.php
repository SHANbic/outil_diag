<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Votre diagnostic immédiat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .hide {
            display: none;
        }

        form {
            max-width: 480px;
            margin: 0 auto;
        }

        .btn {
            margin: 5px auto;
            width: 100%;
        }

        .element {
            margin: 20px auto;

        }

        h2 {
            text-align: center;
            margin: 20px;
        }

        .btn:hover {
            cursor: pointer;

        }

        .prev:hover {
            background-color: lightgray;
        }

        .progress {

            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <form action="formSubmission.php" method="post">
            <h2>Votre outil de diagnostic digital personnalisé</h2>

            <?php
            require 'fonctions.php';

            if (isset($_SESSION['data'])) : 
                ?>
            <p>Merci de nous avoir fait confiance pour réaliser votre diagnostic.Grâce a vos informations, nous sommes
                en mesure de vous proposer
                notre pack <b><?php echo $_SESSION['data']->pack;?></b>. Celui ci est composé de
                <?php echo $_SESSION['data']->contenu;?>.</p>

            <p>Notre prix: <?php  echo $_SESSION['data']->prix; ?>,00€ HT</p>

            <p>Nous revenons vers vous par mail aussi vite que possible.</p>

            <p style="text-align:right">Human Centric Consulting</p>
            <?php 
                unset($_SESSION['data']);
            else :?>


            <div class="btn btn-success btn-block" id="start">Commencer</div>

            <!--elements[0]-->
            <div class="element hide">
                <h3>Merci de nous communiquer votre adresse e-mail</h3>
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">requis :</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="mail" name="email"
                            placeholder="ex: jean.dupont@outlook.fr" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div id="mailcheck" class="btn btn-primary btn-block next hide">Suivant</div>
                    </div>
                </div>
            </div>

            <!--elements[1]-->
            <div class="element hide">
                <h3>Pour quel type d'entreprise travaillez-vous?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios1"
                                    value="TPE" goto="2">
                                <label class="form-check-label" for="gridRadios1">
                                    Je suis une TPE
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios2"
                                    value="PME" goto="2">
                                <label class="form-check-label" for="gridRadios2">
                                    Je suis une PME
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios3"
                                    value="ETI" goto="2">
                                <label class="form-check-label" for="gridRadios3">
                                    Je suis une ETI
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios4"
                                    value="GE" goto="2">
                                <label class="form-check-label" for="gridRadios4">
                                    Je suis une Grande Entreprise
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>



            <!--elements[2]-->
            <div class="element hide">
                <h3>Qui serez-vous sur ce projet</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decisionnaire" id="gridRadios5"
                                    value="oui" goto="3">
                                <label class="form-check-label" for="gridRadios5">
                                    Je serai le décisionnaire
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="decisionnaire" id="gridRadios6"
                                    value="non" goto="3">
                                <label class="form-check-label" for="gridRadios6">
                                    Je serai votre interlocuteur
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>

            <!--elements[3]-->
            <div class="element hide">
                <h3>Avez-vous déjà suivi une formation?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formation" id="gridRadios7"
                                    value="oui" goto="4">
                                <label class="form-check-label" for="gridRadios7">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formation" id="gridRadios8"
                                    value="non" goto="4">
                                <label class="form-check-label" for="gridRadios8">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>

            <!--elements[4]-->
            <div class="element hide">
                <h3>Où en êtes-vous dans votre projet?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse_par" id="gridRadios9"
                                    value="transformation digitale" goto="5">
                                <label class="form-check-label" for="gridRadios9">
                                    Je recherche des informations sur la transformation digitale
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse_par" id="gridRadios10"
                                    value="cabinet de consulting digital" goto="5">
                                <label class="form-check-label" for="gridRadios10">
                                    Je recherche des informations sur des cabinets de consulting digital
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse_par" id="gridRadios11"
                                    value="audit technique de l'entreprise" goto="5">
                                <label class="form-check-label" for="gridRadios11">
                                    je réalise un audit technique de mon entreprise
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interesse_par" id="gridRadios12"
                                    value="vos services" goto="5">
                                <label class="form-check-label" for="gridRadios12">
                                    Je recherche des informations sur vos services
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[5]-->
            <div class="element hide">
                <h3>La transformation digitale est-elle une de vos priorités?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="priorite" id="gridRadios13"
                                    value="oui" goto="6">
                                <label class="form-check-label" for="gridRadios13">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="priorite" id="gridRadios14"
                                    value="non" goto="7">
                                <label class="form-check-label" for="gridRadios14">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[6]-->
            <div class="element hide">
                <h3>D'autres personnes participeront-elles à nos échanges?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="autre_interlocuteur"
                                    id="gridRadios15" value="oui" goto="7">
                                <label class="form-check-label" for="gridRadios15">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="autre_interlocuteur"
                                    id="gridRadios16" value="non" goto="7">
                                <label class="form-check-label" for="gridRadios16">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[7]-->
            <div class="element hide">
                <h3>Quel est l'avis de vos équipes sur la transformation digitale?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="avis_equipe_transformation_digitale"
                                    id="gridRadios17" value="très bon" goto="8">
                                <label class="form-check-label" for="gridRadios17">
                                    Très bon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="avis_equipe_transformation_digitale"
                                    id="gridRadios18" value="plutôt bon" goto="8">
                                <label class="form-check-label" for="gridRadios18">
                                    Plutôt bon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="avis_equipe_transformation_digitale"
                                    id="gridRadios19" value="bon" goto="8">
                                <label class="form-check-label" for="gridRadios19">
                                    Bon
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="avis_equipe_transformation_digitale"
                                    id="gridRadios20" value="plutôt mauvais" goto="8">
                                <label class="form-check-label" for="gridRadios20">
                                    Plutôt mauvais
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="avis_equipe_transformation_digitale"
                                    id="gridRadios21" value="très mauvais" goto="9">
                                <label class="form-check-label" for="gridRadios21">
                                    Très mauvais
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[8]-->
            <div class="element hide">
                <h3>Vos équipes craignent-elles un impact négatif sur leur travail</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="crainte" id="gridRadios22"
                                    value="oui" goto="9">
                                <label class="form-check-label" for="gridRadios22">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="crainte" id="gridRadios23"
                                    value="non" goto="9">
                                <label class="form-check-label" for="gridRadios23">
                                    Non
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="crainte" id="gridRadios24"
                                    value="mitigé" goto="9">
                                <label class="form-check-label" for="gridRadios24">
                                    Elles sont mitigées
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="crainte" id="gridRadios25"
                                    value="je ne sais pas" goto="9">
                                <label class="form-check-label" for="gridRadios25">
                                    Je ne sais pas
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[9]-->
            <div class="element hide">
                <h3>Avous-vous les ressources humaines pour accompagner vos équipes?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ressources_humaines"
                                    id="gridRadios26" value="oui" goto="13">
                                <label class="form-check-label" for="gridRadios26">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ressources_humaines"
                                    id="gridRadios27" value="pas assez" goto="10">
                                <label class="form-check-label" for="gridRadios27">
                                    Pas assez
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="ressources_humaines"
                                    id="gridRadios28" value="non" goto="10">
                                <label class="form-check-label" for="gridRadios28">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[10]-->
            <div class="element hide">
                <h3>Vos clients sont-ils familiers avec les appareils numériques?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="clients_et_appareils_numeriques"
                                    id="gridRadios29" value="familiarisés" goto="11">
                                <label class="form-check-label" for="gridRadios29">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="clients_et_appareils_numeriques"
                                    id="gridRadios30" value="non familiarisés" goto="11">
                                <label class="form-check-label" for="gridRadios30">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[11]-->
            <div class="element hide">
                <h3>Vos clients sont-ils familiers avec les réseaux sociaux?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="clients_et_reseaux_sociaux"
                                    id="gridRadios31" value="familiarisés" goto="12">
                                <label class="form-check-label" for="gridRadios31">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="clients_et_reseaux_sociaux"
                                    id="gridRadios32" value="non familiarisés" goto="12">
                                <label class="form-check-label" for="gridRadios32">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[12]-->
            <div class="element hide">
                <h3>Selon vous, vos clients pensent-ils que la numérisation a un impact positif dans leurs vies?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="impact_numerisation"
                                    id="gridRadios33" value="très" goto="13">
                                <label class="form-check-label" for="gridRadios33">
                                    Très
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="impact_numerisation"
                                    id="gridRadios34" value="assez" goto="13">
                                <label class="form-check-label" for="gridRadios34">
                                    Assez
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="impact_numerisation"
                                    id="gridRadios35" value="pas assez" goto="13">
                                <label class="form-check-label" for="gridRadios35">
                                    Pas assez
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="impact_numerisation"
                                    id="gridRadios36" value="pas du tout" goto="13">
                                <label class="form-check-label" for="gridRadios36">
                                    Pas du tout
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[13]-->
            <div class="element hide">
                <h3>Selon vous, vos concurrents ont-ils déjà engagé une transformation digitale?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transformation_digitale_concurrent"
                                    id="gridRadios37" value="oui" goto="14">
                                <label class="form-check-label" for="gridRadios37">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transformation_digitale_concurrent"
                                    id="gridRadios38" value="ne sais pas" goto="14">
                                <label class="form-check-label" for="gridRadios38">
                                    Je ne sais pas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="transformation_digitale_concurrent"
                                    id="gridRadios39" value="non" goto="14">
                                <label class="form-check-label" for="gridRadios39">
                                    Non
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>

            <!--elements[14]-->
            <div class="element hide">
                <h3>Faites-vous une veille concurrentielle poussée et régulière?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="veille_concurrentielle"
                                    id="gridRadios40" value="oui" goto="15">
                                <label class="form-check-label" for="gridRadios40">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="veille_concurrentielle"
                                    id="gridRadios41" value="pas assez" goto="15">
                                <label class="form-check-label" for="gridRadios41">
                                    Pas assez
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="veille_concurrentielle"
                                    id="gridRadios42" value="non" goto="15">
                                <label class="form-check-label" for="gridRadios42">
                                    Non
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="veille_concurrentielle"
                                    id="gridRadios43" value="pas du tout" goto="15">
                                <label class="form-check-label" for="gridRadios43">
                                    Pas du tout
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>
            <!--elements[15]-->
            <div class="element hide">
                <h3>Quels sont vos besoins?</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="besoins" id="gridRadios44"
                                    value="initier virage digital" goto="16">
                                <label class="form-check-label" for="gridRadios44">
                                    Je dois initier un virage digital
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="besoins" id="gridRadios45"
                                    value="renouveler transition digitale" goto="16">
                                <label class="form-check-label" for="gridRadios45">
                                    Je dois renouveler notre transition digitale
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="besoins" id="gridRadios46"
                                    value="ne sait pas" goto="17">
                                <label class="form-check-label" for="gridRadios46">
                                    Je réfléchis encore
                                </label>
                            </div>

                        </div>
                    </div>
                </fieldset>

                <div class="form-group row">
                    <div class="col-sm-12">

                        <div class="btn btn-primary btn-block next">Suivant</div>
                        <div class="btn btn-default btn-block prev">Précédent</div>
                    </div>
                </div>
            </div>

            <!--elements[16]-->
            <div class="element hide">
                <h3>Merci pour le temps que vous nous avez consacré.</h3>
                <div class="form-group">
                    <label for="commentaire1">Avez-vous des remarques à nous faire?</label>
                    <textarea class="form-control" id="commentaire1" rows="3" name="commentaire1"></textarea>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-block" name="submit"
                                value="1">Envoyer</button>

                            <div class="btn btn-default btn-block prev">Précédent</div>
                        </div>
                    </div>
                </div>
            </div>

            <!--elements[17]-->
            <div class="element hide">
                <h3>Merci pour le temps que vous nous avez consacré.</h3>
                <div class="form-group">
                    <label for="commentaire2">Avez-vous des remarques à nous faire?</label>
                    <textarea class="form-control" id="commentaire2" rows="3" name="commentaire2"></textarea>


                    <div class="form-group row">
                        <div class="col-sm-12">

                            <button type="submit" class="btn btn-success btn-block" name="submit"
                                value="2">Envoyer</button>
                            <div class="btn btn-default btn-block prev">Précédent</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="progress hide">
                <div id="dynamic" class="progress-bar progress-bar-success progress-bar-striped active"
                    role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span id="current-progress"></span>
                </div>
            </div>
            <?php endif;?>

        </form>


    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>