<?php

   require('../Controller/Util.php');
   
   
   session_start();
    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
        $Util = new Util();
        $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
        $Medecin = new Medecin();
        $Medecin = $Utilisateur->getMedecin();
   } 
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Editer une ordonnance
    </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
    <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="content" class="span9">
                <div class="main_body">

                    <div class="Home-Header">
                        <div class="Slogan">

                        </div>
                        <div class="Contact-Research">

                        </div>
                        <div class="Logo">

                        </div>
                    </div>
                    <div class="Horizontal-menu">
                        <center>
                            <h4>
                                <?php
                                echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                ?>
                            </h4>
                        </center>
                    </div>
                    <div class="Left-body">
                        <div class="Left-body-head">
                            Editer une ordonnance
                        </div>
                        <div class="infos">
                        </div>
                        <div class="en_bref">
                            <form action="editer_ordonnance_medecin.php" method="post">
                                <label>Id_ordonnance :</label>
                                <input class="textfield_form" name="Id_ordonnance" type="text" size="50" /><br />
                                <label>Detail_medicament :</label>
                                <input class="textfield_form" name="Detail_medicament" type="text" size="50" /><br />
                                <label>Date_ordonnance :</label>
                                <input class="textfield_form" type="date" name="Date_ordonnance" size="50"/><br />
                                <input type="submit" name="valider" value="Editer" />
                                    <tbody>
                                        <?php
                                        if(isset($_POST["Detail_medicament"])){
                                        $Query = "UPDATE ordonnance SET Detail_Medicament="."'".$_POST["Detail_medicament"]."'"."WHERE Id_Ordonnance=".$_POST['Id_ordonnance'];
                                        //echo $Query;
                                        $Util->dbConnection();
                                        if ($Util->mysqli->connect_error) {
                                            die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
                                        } else {
                                            if(($result = $Util->mysqli->query($Query))){
                                                //echo "id de la ligne modifiee:".$result;
                                            } else {
                                                //echo "rien n'a ete modifie";
                                            }
                                        }
                                    }
                                        else{
                                        }
                                        ?>
                                    </tbody>
                                    <tbody>
                                        <?php
                                        if(isset($_POST["Date_ordonnance"])){
                                        $Query = "UPDATE ordonnance SET Date_Ordonnance="."'".$_POST["Date_ordonnance"]."'"."WHERE Id_Ordonnance=".$_POST['Id_ordonnance'];
                                        //echo $Query;
                                        $Util->dbConnection();
                                        if ($Util->mysqli->connect_error) {
                                            die('Erreur de connexion (' . $Util->mysqli->connect_errno . ')' . $Util->mysqli->connect_error);
                                        } else {
                                            if(($result = $Util->mysqli->query($Query))){
                                                //echo "id de la ligne modifiee:".$result;
                                            } else {
                                                //echo "rien n'a ete modifie";
                                            }
                                        }
                                    }
                                        else{
                                        }
                                        ?>
                                    </tbody>
                            </form>
                        </div>
                    </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">

                            </div>
                            <div class="Social-NW-body">
                                <a href="medecin_display.php"><i class="icon-home"></i> Retourner au menu</a>
                                <br/><hr>
                                <a href="liste_consultation_medecin.php"><i class="icon-file"></i> Mes consultations</a>
                                <br/>
                                <a href="liste_patient_medecin.php"><i class="icon-user"></i> Mes patients</a>
                                <br/>
                                <a href="liste_rendez_vous_medecin.php"><i class="icon-calendar"></i> Mes rendez-vous</a>
                                <br/><hr>
                                <a href="editer_consultation_medecin.php"><i class="icon-pencil"></i> Editer une consultation</a><br>
                                <hr>
                                <a href="recherche_date_rendez_vous.php"><i class="icon-search"></i> Rechercher un rendez-vous par date</a><br>
                                <a href="recherche_patient_medecin.php"><i class="icon-search"></i> Rechercher un patient</a><br>
                                <a href="recherche_consultation_medecin.php"><i class="icon-search"></i> Rechercher une consultation</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    &COPY; Cabinet Médical 2021
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>



</html>