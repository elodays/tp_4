<?php session_start(); ?>
<?php
 include "vues/header.php"; //on dit header et dans vue 
include "modeles/continent.php";
include "modeles/monPdo.php";
$uc=empty($_GET['uc'])? "accueil" : $_GET ['uc'];
//la on va lui donner des consigne avec les case et break on lui dit si il vois acueile alors uc
switch($uc){  
    case 'accueil' : 
        include('vues/accueil.php'); // on lui dit si il trouve pas qui doit aller dans l'accueil
        break; // alors fin 
     case'continents': // si il voit continant alors faire tous se qui suit jusqu'au puis break
         include('controllers/continentController.php') ; 
        break; // sortie
}
 include "vues/footer.php";?>