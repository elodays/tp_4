<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'liste';

switch ($action) {
    case 'liste':
        $lesAuteurs = Auteur::findAll();
        include('vues/auteur/listeAuteurs.php');
        break;

    case 'add':
        $mode = "Ajouter";
        include('vues/auteur/formAuteur.php');
        break;

    case 'update':
        $mode = "Modifier";
        $auteur = Auteur::findById($_GET['num']);
        include('vues/auteur/formAuteur.php');
        break;

    case 'delete':
        $auteur = Auteur::findById($_GET['num']);
        $nb = Auteur::delete($auteur);
        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "L'auteur a bien été supprimé"];
        } else {
            $_SESSION['message'] = ["danger" => "L'auteur n'a pas pu être supprimé"];
        }
        header('location: index.php?uc=auteur&action=liste');
        break;

    case 'valideForm':
        $auteur = new Auteur();
        if (empty($_POST['num'])) { // si création
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $nb = Auteur::add($auteur);
            $message = "ajouté";
        } else { // cas modification
            $auteur->setNum($_POST['num']);
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $nb = Auteur::update($auteur);
            $message = "modifié";
        }

        if ($nb == 1) {
            $_SESSION['message'] = ["success" => "L'auteur a bien été $message"];
        } else {
            $_SESSION['message'] = ["danger" => "L'auteur n'a pas pu être $message"];
        }

        header('location:index.php?uc=auteurs&action=liste');
        exit();
        break;
}
?>