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
        $Secretaire = new Secretaire();
        $Secretaire = $Utilisateur->getSecretaire();
   }


?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               liste_rendez_vous
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
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
                                        echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Liste des rendez-vous à venir 
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>id rendez_vous </th>
                                        <th>date rendez_vous </th>
                                        <th>salle</th>
                                        <th>id patient</th>
                                        <th>id médecin</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $Query = "SELECT * FROM rendez_vous";
            
                                    $Util->dbConnection();
                                        
                                    if ($Util->mysqli->connect_error) {
                                        die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
                                    } else {
                                        if(($result = $Util->mysqli->query($Query))){
                                            while($ligne = $result->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?= $ligne['Id_Rendez_Vous' ]?></td>
                                                <td><?= $ligne['Date_Rendez_Vous'] ?></td>
                                                <td><?= $ligne['Salle_Rendez_Vous'] ?></td>
                                                <td><?= $ligne['Id_Patient'] ?></td>
                                                <td><?= $ligne['Id_Medecin'] ?></td>
                                            </tr>
                                            <?php }
                                
                                        }
                                    
                                    }
                                
                                ?> 
                               </tbody>
                                </table>
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                                <a href="secretaire_display.php"><i class="icon-home"></i> Retourner au menu</a>
                                <br/><hr>
                                <a href="liste_patients.php"><i class="icon-user"></i> Liste des patients</a>
                                <br/>
                                <a href="liste_medecin.php"><i class="icon-user"></i> Liste des médecins</a>
                                <hr/>
                                <a href="ajout_rendez_vous.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br/>
                                <a href="ajout_patient.php"><i class="icon-plus-sign"></i> Ajouter un patient</a>
                                <br/>
                                <hr/>
                                <a href="recherche_patient.php"><i class="icon-search"></i> recherche patient</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>
                                
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
