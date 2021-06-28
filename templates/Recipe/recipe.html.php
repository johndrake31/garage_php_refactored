<hr>
<div class="container">
    <div class="row col-4 bg-success">
        <h2><strong> <?= $recipe->name; ?> </strong></h2>
        <p>Recipe: <strong> <?= $recipe->description; ?> </strong></p>
        <p><a href="index.php?controller=make&task=addMakeRecipe&show=recipe&id=<?= $recipe->id; ?>" class="btn btn-primary me-2"> Makes 🤍 </a> <?= $recipe->getMakes(); ?></p>
        <a href="index.php?controller=cake&task=show&id=<?= $recipe->cake_id; ?>" class="btn btn-info my-3 ms-4" style="width: 200px">Back to Cake</a>

        <!-- EDIT RECIPE AREA -->
        <?php if (!isset($_GET['edit'])) { ?>
            <form action="index.php?controller=recipe&task=show&edit=on" method="POST">
                <button name="id" value="<?= $recipe->id; ?>" class="btn btn-danger mb-3 ms-3 " style="width: 200px">Edit ce Recipe</button>
            </form>
        <?php } else { ?>

            <h4>Edit Recipe</h4>
            <form class="mb-5" action="index.php?controller=recipe&task=update" method="POST">
                <input type="hidden" name="id" value="<?= $recipe->id; ?>">
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Name</label>
                    <input name="name" value="<?= $recipe->name; ?>" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPrice2" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleInputPrice2" cols="30" rows="2"><?= $recipe->name; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-5">Submit</button>
            </form>


        <?php } ?>




    </div>
</div>