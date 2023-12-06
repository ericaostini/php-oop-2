<div class="col-12 col-md-4 col-lg-3">
    <div class="card h-100 g-1">
        <img src="<?= $img ?>" class="card-img-top" alt="<?= $title ?>">
        <div class="card-body">
            <?php if(isset($error) && $error) { ?>
                <div class="alert alert-danger">
                    <?= $error ?>
                </div>
            <?php } ?>
            <h5>
                <?= $title ?>
            </h5>
            <p class="card-text">
                <?= $overview ?>
            </p>
            <?php if(isset($object)) { ?>
                <div>
                    <?= $object ?>
                </div>
            <?php } ?>
            <?php if(isset($vote) && isset($language)) { ?>
                <div>
                    <small>
                        <p>
                            <?= $voteStar.$vote ?>
                        </p>
                    </small>
                    <small>
                        <img src="<?= $language ?>" alt="">
                    </small>
                </div>
            <?php } ?>
            <?php if(isset($genres)) { ?>
                <div>
                    <?= $genres ?>
                </div>
            <?php } ?>
            <div class="mt-3">
                <h6 class="text-danger">Acquista</h6>
                <ul>
                    <li>Quantità:
                        <?= $quantity ?>
                    </li>
                    <li>
                        <?php if($discount > 0) { ?>
                            Prezzo:
                            <span class="text-decoration-line-through">
                                <?= $price ?>$
                            </span>
                            <span class="badge bg-secondary">
                                <?= $discount_price ?>$
                            </span>
                        <?php } else { ?>
                            <span>
                                <?= $price ?>$
                            </span>
                        <?php } ?>
                    </li>
                    <?php if($discount > 0) { ?>
                        <li>
                            Sconto:
                            <?= $discount ?>%
                        </li>
                    <?php } else { ?>
                        <li>Nessuno sconto applicato </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>