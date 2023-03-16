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
        $Medecin_Id = $Medecin->getId_Medecin();
   } 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               liste patients
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
                                       echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Liste des patients
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                            <table class="table" style="width:20%">
                                    <thead>
                                    <tr>
                                        <th>id patient </th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Adresse</th>
                                        <th>Ville</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                <?php
                                    $Query = "SELECT * FROM patient INNER JOIN rendez_vous ON patient.Id_Patient=rendez_vous.Id_Patient WHERE rendez_vous.Id_Medecin='$Medecin_Id'";
                                    $Util->dbConnection();
                                    
                                        
                                    if ($Util->mysqli->connect_error) {
                                        die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
                                    } else {
                                        if(($result = $Util->mysqli->query($Query))){
                                            while($ligne = $result->fetch_assoc()){ ?>
                                            <tr>
                                                <td><?= $ligne['Id_Patient' ]?></td>
                                                <td><?= $ligne['Nom_Patient'] ?></td>
                                                <td><?= $ligne['Prenom_Patient'] ?></td>
                                                <td><?= $ligne['Sexe_Patient'] ?></td>
                                                <td><?= $ligne['Adresse_Patient'] ?></td> 
                                                <td><?= $ligne['Ville_Patient'] ?></td> 
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
                                <a href="medecin_display.php"><i class="icon-home"></i> Retourner au menu</a>
                                <br/><hr>
                                <a href="liste_consultation_medecin.php"><i class="icon-file"></i> Mes consultations</a>
                                <br/>
                                
                                <a href="liste_rendez_vous_medecin.php"><i class="icon-calendar"></i> Mes rendez-vous</a>
                                <br/><hr>
                                <a href="editer_consultation_medecin.php"><i class="icon-pencil"></i> Editer une consultation</a><br>
                                <a href="editer_ordonnance_medecin.php"><i class="icon-pencil"></i> Editer une ordonnance</a><br><hr>
                                <a href="recherche_date_rendez_vous.php"><i class="icon-search"></i> Rechercher un rendez-vous par date</a><br>
                                <a href="recherche_patient_medecin.php"><i class="icon-search"></i> Rechercher un patient</a><br>
                                <a href="recherche_consultation_medecin.php"><i class="icon-search"></i> Rechercher une consultation</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>
                                
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
