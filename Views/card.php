<div class="col-12 col-md-4 col-lg-3">
    <div class="card h-100 g-1">
        <img src="<?= $img ?>" class="card-img-top" alt="<?= $title ?>">
        <div class="card-body">
            <h5>
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $overview ?>
            </p>
            <div>
                <small>
                    <p>
                        <?= $vote ?>
                    </p>
                </small>
                <small>
                    <img src="<?= $language ?>" alt="">
                </small>
            </div>
            <div>
                <small>
                    <?= $genres ?>,
                    <?= $second ?>
                </small>
            </div>
            <div class="mt-3">
                <h6>Acquista</h6>
                <ul>
                    <li>Quantità:
                        <?= $quantity ?>
                    </li>
                    <li>
                        Prezzo:
                        <?= $price ?>$
                    </li>
                    <?php if ($discount > 0) { ?>
                    <li>
                        Sconto:
                        <?= $discount ?>%
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>