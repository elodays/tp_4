<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'liste';

switch ($action) {
    case 'liste':
        //TRAITEMENT FORMULAIRE DE RECHERCHE
        $libelle = '';
        $continentSel = 'Tous';
        if (!empty($_POST['libelle']) || !empty($_POST['continent'])) {
            $libelle = $_POST['libelle'];
            $continentSel = $_POST['continent'];
        }
        $lesContinents = Continent::findAll();
        $lesNationalites = Nationalite::findAll($libelle, $continentSel);
        include('vues/nationalite/listeNationalites.php');
        break;

    case 'add':
        $mode = "Ajouter";
        $lesContinents = Continent::findAll();
        include('vues/nationalite/formNationalite.php');
        break;

    case 'update':
        $mode = "Modifier";
        $lesContinents = Continent::findAll();
        $laNationalite = Nationalite::findById($_GET['num']);
        include('vues/nationalite/formNationalite.php');
        break;

    case 'delete':
        $laNationalite = Nationalite::findById($_GET['num']);
        $nb = Nationalite::delete($laNationalite);
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "La nationalité a bien été supprimée"];
        } else {
            $_SESSION['message'] = ["danger" => "La nationalité n'a pas pu être supprimée"];
        }
        header('location: index.php?uc=nationalites&action=liste');
        break;

    case 'validerForm':
        $nationalite = new Nationalite();
        $continent = Continent::findById($_POST['continent']);
        $nationalite->setLibelle($_POST['libelle'])
                 ->setNumContinent($continent);
        if (empty($_POST['num'])) {
            $nb = Nationalite::add($nationalite);
            $message = "ajoutée";
        } else {
               $nb = Nationalite::update($nationalite);
            $message = "modifiée";
        }

        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "La nationalité a bien été $message"];
        } else {
            $_SESSION['message'] = ["danger" => "La nationalité n'a pas pu être $message"];
        }

        header('location:index.php?uc=nationalites&action=liste');
        exit();
        break;
}
?>