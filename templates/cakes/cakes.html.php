<div class="container">
    <div class="row">
        <?php
        foreach ($cakes as  $cake) { ?>
            <div class="col-6 bg-success m-5">
                <h2><?php echo $cake['flavor'] ?></h2>
                <h6><?php echo $cake['description'] ?></h6>
                <hr>
                <!-- <a href="index.php?controller=cake&task=show&id=<?= $cake['id']; ?>" class="btn btn-info mb-3 mx-3">voir ce cake</a> -->
                <a href="index.php?controller=cake&task=suppr&id=<?= $cake['id']; ?>" class="btn btn-danger mb-3">Supprimer ce cake</a>
                <a href="index.php?controller=cake&task=show&id=<?= $cake['id']; ?>" class="btn btn-info mb-3">voir ce cake</a>

            </div>

        <?php } ?>

    </div>
</div>