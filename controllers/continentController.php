    }else{
$action=$_GET['action']; // recuperer l inde action // ensuite on va lui demander de regarder se qu'il a mis dans action avec les switch
switch($action)  {
    case 'liste' :
        $lescontinents=continent::findAll(); // il va faire appel a se modele dans la base de donner 
        include('vues/listeContinents.php'); // on va appeller  le dossier vue dans laquelle il a la liste des contient avec inclue
    case 'add' :
        $mode="Ajouter";
        include('vues/formContinent.php');
    case 'update':
                         
                break;
     case 'valideForm' :
        $continent=new Contient();
        if(empty($_POST['libelle']));
        continent->setLibelle(£_POST['libelle']);
        $nb=Continent::add($continent);
        $message ="modifié";
        }else{ 

        }
        
    if ($b==1){
        $_SESSION['message']=["success"=>"Le contient a bien a bien ete $message"];
<?php 
        $_SESSION['message']=["danger"=>"Le contient a bien ete" $message"]
    }
    break;
}