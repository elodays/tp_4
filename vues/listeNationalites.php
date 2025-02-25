<div class="container mt-5">
    <h2 class="pt-3 text-center">Liste des nationalités</h2>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?php echo key($_SESSION['message']); ?>">
            <?php echo current($_SESSION['message']); unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Numéro</th>
                <th>Libellé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesNationalites as $nationalite): ?>
                <tr>
                    <td><?php echo $nationalite->getNum(); ?></td>
                    <td><?php echo $nationalite->getLibelle(); ?></td>
                    <td>
                        <a href="index.php?uc=nationalites&action=update&num=<?php echo $nationalite->getNum(); ?>" class="btn btn-primary">Modifier</a>
                        <a href="index.php?uc=nationalites&action=delete&num=<?php echo $nationalite->getNum(); ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?uc=nationalites&action=add" class="btn btn-success">Ajouter une nationalité</a>
</div>