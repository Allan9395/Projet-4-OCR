<?php $title = 'Blog Ecrivain - Jean Forteroche - Page des Chapitres'; ?>

<?php ob_start(); ?>

<header class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h2 class="chapters">Chapitres</h2>

            <?php while ($data = $tickets->fetch()) {?>

            <div class="card mb-12 chapter" style="max-width: auto;">
                <div class="row no-gutters">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="index.php?action=ticket&amp;id=<?= $data['id'];?>">
                                    <?= htmlspecialchars($data['title']) ?> </a> </h5>
                            <p class="card-text"><?= htmlspecialchars($data['ticketDescription']) ?></p>
                            <p class="card-text"><small><?= 'Publié le '. $data['date_jma']. ' à '. $data['date_hm'] ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } $tickets->closeCursor();?>
        </div>
    </div>
</header>

<?php $content = ob_get_clean(); ?>
<?php require('views/frontend/template.php');?>