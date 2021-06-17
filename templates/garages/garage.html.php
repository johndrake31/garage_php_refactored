<hr>
<div class="container">
    <div class="row col-4">
        <h4><strong> <?= $garage['name']; ?> </strong></h4>
        <p><strong> <?= $garage['address']; ?> </strong></p>
        <p><strong> <?= $garage['description']; ?> </strong></p>
        <a href="index.php" class="btn btn-info">HOME</a>
    </div>
</div>
<hr>


<!-- CREATE ANNONCE -->
<div class="container">
    <div class="row col-6">
        <h3>Add annonce</h3>
        <form action="saveAnnonce.php" method="POST">

            <input type="hidden" name="garageId" value="<?= $garage['id'] ?>">
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Title</label>

                <textarea name="name" type="text" class="form-control" rows="1" id="exampleInputText1" aria-describedby="emailHelp"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Price</label>

                <input name="price" type="text" class="form-control" id="exampleInputPrice">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
<hr>


<div class="container">
    <div class="row col-4">
        <?php if (empty($annonces)) { ?>
            <h5>There are no annonces at this time.</h5>
        <?php } ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($annonces as $annonce) { ?>
            <?=
            "<div class='col-6'>" .
                "<hr>" .
                "<h6>" . $annonce['name'] . "</h6>" .
                "<br> Price: "
                . "$" . $annonce['price']
                . "<br>";
            ?>
            <a href="deleteAnnonce.php?id=<?= $annonce['id']; ?>" class="btn btn-danger m-3">Supprimer cette Annonce</a>
            <hr>
    </div>
<?php }  ?>

</div>
</div>