<div class="container">

    <!-- CREATE ANNONCE -->

    <div class="container">
        <div class="row col-6">
            <?php if (!empty($_GET['addCake']) && $_GET['addCake'] = "on") { ?>
                <h3>Add Cake</h3>
                <form action="index.php?controller=cake&task=save" method="POST">

                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Flavor</label>
                        <input name="flavor" type="text" class="form-control" id="exampleInputPrice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice2" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleInputPrice2" cols="30" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            <?php } else { ?>
                <a href="index.php?addCake=on" class="btn btn-info col-3">Add Cake</a>
            <?php } ?>

        </div>
    </div>
    <hr>

    <div class="row">
        <?php
        foreach ($cakes as  $cake) { ?>
            <div class="col-6 bg-success m-5">

                <h2><?php echo $cake['title'] ?></h2>
                <h4>Flavor: <?php echo $cake['flavor'] ?></h4>
                <h6><?php echo $cake['description'] ?></h6>
                <hr>

                <a href="index.php?controller=cake&task=show&id=<?= $cake['id']; ?>" class="btn btn-info mb-3">voir ce cake</a>

            </div>

        <?php } ?>

    </div>
</div>