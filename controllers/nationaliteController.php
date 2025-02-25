<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'liste':
        $lesNationalites = Nationalite::findAll();
        include('vues/listeNationalites.php');
        break;

    case 'add':
        $mode = "Ajouter";
        include('vues/formNationalite.php');
        break;

    case 'update':
        $mode = "Modifier";
        $nationalite = Nationalite::findById($_GET['num']);
        include('vues/formNationalite.php');
        break;

    case 'delete':
        $nationalite = Nationalite::findById($_GET['num']);
        $nb = Nationalite::delete($nationalite);
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "La nationalité a bien été supprimée"];
        } else {
            $_SESSION['message'] = ["danger" => "La nationalité n'a pas pu être supprimée"];
        }
        header('location: index.php?uc=nationalites&action=liste');
        break;

    case 'valideForm':
        $nationalite = new Nationalite();

        if (empty($_POST['num'])) {
            $nationalite->setLibelle($_POST['libelle']);
            $nb = Nationalite::add($nationalite);
            $message = "ajoutée";
        } else {
            $nationalite->setNum($_POST['num']);
            $nationalite->setLibelle($_POST['libelle']);
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