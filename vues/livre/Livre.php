<h1>Liste des livres</h1>

<!-- Formulaire de recherche -->
<form method="GET" action="index.php">
    <input type="hidden" name="action" value="rechercherLivres">
    <input type="text" name="search" placeholder="Rechercher un livre ou un auteur">
    <button type="submit">Rechercher</button>
</form>

<a href="?action=ajouter">Ajouter un livre</a>
<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Genre</th>
    </tr>
    <?php foreach ($livres as $livre): ?>
        <tr>
            <td><?= $livre['titre'] ?></td>
            <td><?= $livre['auteur'] ?></td>
            <td><?= $livre['genre'] ?></td>
            <td>
                <a href="?action=modifier&id=<?= $livre['id'] ?>">Modifier</a>
                <a href="?action=supprimer&id=<?= $livre['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
