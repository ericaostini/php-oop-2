<div class="col-12 col-md-4 col-lg-3">
    <div class="card h-100 g-1 item-image">
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
            <div class="d-flex align-items-end justify-content-between">
                <small>
                    <p>
                        <?= $voteStar.$vote ?>
                    </p>
                </small>
                <small class="flag">
                    <img src="<?= $language ?>" alt="">
                </small>
            </div>
            <?php } ?>
            <?php if(isset($genres)) { ?>
            <div>
                <?= $genres ?>
            </div>
            <?php } ?>
            <div class="mt-3  border border-secondary p-2 rounded-2">
                <h6>Acquista</h6>
                <ul class="list-unstyled ">
                    <li>Quantità:
                        <?= $quantity ?>
                    </li>
                    <li>
                        <?php if($discount > 0) { ?>
                        Prezzo:
                        <span class="text-decoration-line-through text-danger fw-bolder ">
                            <?= $price ?>$
                        </span>
                        <h3 class="badge bg-success">
                            <?= $discount_price ?>$
                        </h3>
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