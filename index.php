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
            <p>Nous vous remercions pour votre temps. Grâce a vos informations, nous sommes en mesure de vous proposer
                notre pack <b><?php echo $_SESSION['data']->pack;?></b>. Celui ci est composé de
                <?php echo $_SESSION['data']->contenu;?>.</p>

            <p>Notre prix: <?php  echo $_SESSION['data']->prix; ?>,00€ HT</p>

            <p>Nous revenons vers vous par mail aussi vite que possible.</p>

            <p>Human Centric Consulting</p>
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
                            placeholder="ex: jean.dupont@outlook.fr" goto="0" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <div id="mailcheck" class="btn btn-primary btn-block next hide mx-auto">Suivant</div>
                    </div>
                </div>
            </div>

            <!--elements[1]-->
            <div class="element hide">
                <h3>Qui êtes-vous?</h3>
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
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios3" value="ETI" goto="2">
                                <label class="form-check-label" for="gridRadios3">
                                    Je suis une ETI
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="structure" id="gridRadios4"
                                    value="GE" goto="2">
                                <label class="form-check-label" for="gridRadios4">
                                    Je suis une GE
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
                <h3>Avez-vous déjà suivi une formation digitale (Internet)</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formation_digitale" id="gridRadios5"
                                    value="oui" goto="3">
                                <label class="form-check-label" for="gridRadios5">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="formation_digitale" id="gridRadios6"
                                    value="non" goto="4">
                                <label class="form-check-label" for="gridRadios6">
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

            <!--elements[3]-->
            <div class="element hide">
                <h3>Avez-vous déjà travaillé sur un projet digital (Internet)</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="projet_digital" id="gridRadios7"
                                    value="oui" goto="4">
                                <label class="form-check-label" for="gridRadios7">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="projet_digital" id="gridRadios8"
                                    value="non" goto="5">
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
                <h3>D'autres personnes doivent-elles participer aux échanges</h3>
                <fieldset class="form-group">
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interlocuteurs" id="gridRadios9"
                                    value="oui" goto="5">
                                <label class="form-check-label" for="gridRadios9">
                                    Oui
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="interlocuteurs" id="gridRadios10"
                                    value="non" goto="6">
                                <label class="form-check-label" for="gridRadios10">
                                    Non, je suis seul
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

            <!--elements[6]-->
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