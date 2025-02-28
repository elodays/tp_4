<main role="main">
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Bienvenue !</h1>
      <p>Bienvenue sur le site d'Elodie</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8" style="height: 600px">
            <div class="card text-white mb-3" style="height: 600px">
                <div class="card-header bg-danger">Statistique des livres</div>
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <canvas id="chartContainer"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4" style="height: 600px">
            <div class="card text-white mb-3" style="height: 600px">
                <div class="card-header bg-danger">Statistique générales</div>
                <div class="card-body mt-5">
                    <h4 class="card-title text-center"><a href="index.php?uc=livres&action=list">
                        <span class="badge badge-success"><?php echo Livre::nbLivre(); ?> </span>
                        Livres
                    </a></h4>
                    <hr>
                    <h4 class="card-title text-center"><a href="index.php?uc=auteurs&action=list">
                        <span class="badge badge-primary"><?php echo Auteur::nbAuteur(); ?> </span>
                        Auteurs
                    </a></h4>
                    <hr>
                    <h4 class="card-title text-center"><a href="index.php?uc=genres&action=list">
                        <span class="badge badge-danger"><?php echo Genre::nbGenre(); ?> </span>
                        Genres
                    </a></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
window.onload = function () {
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(array_column(Livre::nbgenre(), 'label')); ?>,
            datasets: [{
                label: 'Répartition des livres par genre',
                data: <?php echo json_encode(array_column(Livre::nbgenre(), 'y')); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Répartition des livres par genre'
                }
            }
        }
    });
}
</script>
</main>