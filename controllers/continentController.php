<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'liste':
        $lesContinents = Continent::findAll();
        include('vues/listeContinents.php');
        break;

    case 'add':
        $mode = "Ajouter";
        include('vues/formContinent.php');
        break;

    case 'update':
        $mode = "Modifier";
        $continent=Continent::findById($_GET['num']);
        include('vues/formContinent.php');
        break;

    case 'delete':
        $continent=Continent::findById($_GET['num']);
        $nb=Continent::delete($continent);
        if($nb==1){
          $_SESSION['message']=["succeess"=>"Le continent a bien été supprimé"];
        }  
        else{
          $_SESSION['message']=["danger"=>"Le continent a bien n'a pas été supprimé"];
        }
        header('location: index.php?uc=continents&action=liste');
        break;

    case 'valideForm':
        $continent = new Continent();

        if (empty($_POST['num'])) { // si création
            $continent->setLibelle($_POST['libelle']);
            $nb = Continent::add($continent);
            $message = "ajouté";
        } else { // cas modification
            $continent->setNum($_POST['num']);
            $continent->setLibelle($_POST['libelle']);
            $nb = Continent::update($continent);
            $message = "modifié";
        }

        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "Le continent a bien été $message"];
        } else {
            $_SESSION['message'] = ["danger" => "Le continent n'a pas pu être $message"];
        }

        header('location:index.php?uc=continents&action=liste');
        exit();
        break;
}
?>
