<hr>

<!-- CAKE CARD -->
<div class="container">
    <div class="row col-4 bg-secondary text-white">
        <h2><strong> <?= $cake['title']; ?> </strong></h2>
        <h4><strong> <?= $cake['flavor']; ?> </strong></h4>
        <p><strong> <?= $cake['description']; ?> </strong></p>
        <?php if (!isset($_GET['edit'])) { ?>
            <a style="width: 200px" href="index.php?controller=cake&task=show&id=<?= $cake['id']; ?>&edit=on" class="btn btn-info mb-3 ms-3 ">Edit cake</a>
        <?php } ?>
        <a style="width: 200px" href="index.php?controller=cake&task=suppr&id=<?= $cake['id']; ?>" class="btn btn-danger mb-3 ms-3 ">Delete cake</a>
    </div>

    <hr>

    <!-- EDIT CAKE -->
    <?php if (isset($_GET['edit']) && $_GET['edit'] == "on") { ?>
        <div class="container">
            <div class="row col-6">
                <h3>Edit Cake</h3>
                <form action="index.php?controller=cake&task=update" method="POST">

                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Title</label>
                        <input value="<?= $cake['title']; ?>" name="title" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice" class="form-label">Flavor</label>
                        <input value="<?= $cake['flavor']; ?>" name="flavor" type="text" class="form-control" id="exampleInputPrice">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice2" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="exampleInputPrice2" cols="30" rows="2"><?= $cake['description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <hr>


    <?php } ?>
    <a href="index.php?controller=cake&task=index" class="btn btn-info m-5">HOME</a>


    <!-- ADD RECIPE BUTTON-->
    <?php if (!isset($_GET["addrecipe"])) { ?>
        <a class="btn btn-warning" href="index.php?controller=cake&task=show&id=<?= $cake['id']; ?>&addrecipe=on">Add Recipe</a>

    <?php } ?>


    <hr>

    <!-- ADD RECIPE FORM -->
    <?php if (isset($_GET["addrecipe"]) && $_GET["addrecipe"] == "on") { ?>
        <div class="container">
            <div class="row col-6">
                <h3>Add <?= $cake['title']; ?> Recipe</h3>
                <form action="index.php?controller=recipe&task=create" method="POST">
                    <input type="hidden" name="cake_id" value="<?= $cake['id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">Recipe Name</label>
                        <input name="name" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPrice2" class="form-label">Description</label>

                        <textarea class="form-control" name="description" id="exampleInputPrice2" cols="30" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        <hr>
    <?php } ?>





    <!-- ALL RECIPES SECTION -->
    <div class="container mb-5">
        <div class="d-flex flex-wrap">
            <?php foreach ($recipes as $recipe) { ?>
                <div class="border border-info border-2 p-3 m-1">
                    <h6><?= $recipe["name"] ?> </h6>
                    <p><?= $recipe["description"] ?> </p>

                    <div class="d-flex">
                        <form action="index.php?controller=recipe&task=suppr" method="post">
                            <button type="submit" name="id" value="<?= $recipe['id']; ?>" class="btn btn-danger me-3 my-1">Delete Recipe</button>
                        </form>


                        <!-- VIEW MORE ABOUT RECIPE BUTTON -->
                        <form action="index.php?controller=recipe&task=show" method="POST">
                            <button type="submit" name="id" value="<?= $recipe['id']; ?>" class="btn btn-secondary my-1">Voir cette Recipe</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<hr>