<?php session_start();?>
<?php include "vues/header.php"; //on dit header et dans vue 

$uc=empty($_GET['uc'])? "accueil" : $_GET ['uc'];

switch($uc){  //la on va lui donner des consigne avec les case et break
    case 'accueil' : // on lui dit si il vois acueile alors uc
        include('vues/accueil.php'); // on lui dit si il trouve pas qui doit aller dans l'accueil
        break; // alors fin 
     case'continents': // si il voit continant alors faire tous se qui suit jusqu'au puis break
            break; // sortie
}
 include "vues/footer.php";?>