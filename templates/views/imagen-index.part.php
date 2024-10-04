<?php foreach ($imagenesHome as $imagen): ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="sol">
            <a href="<?= $imagen->getUrlGaleria() ?>" class="gallery">
                <img class="img-responsive" src="<?= $imagen->getUrlPortfolio() ?>" alt="<?= $imagen->getDescripcion() ?>">
            </a>
            <div class="row box-content">
                <div class="col-xs-4">
                    <i class="fa fa-eye"></i> <?= $imagen->getNumVisualizaciones() ?>
                </div>
                <div class="col-xs-4">
                    <i class="fa fa-heart"></i> <?= $imagen->getNumLikes() ?>
                </div>
                <div class="col-xs-4">
                    <i class="fa fa-download"></i> <?= $imagen->getNumDownloads() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>