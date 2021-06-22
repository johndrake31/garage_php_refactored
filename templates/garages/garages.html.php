  <?php foreach ($garages as $garage) { ?>

      <div class="row">
          <p><strong> <?= $garage['name']; ?> </strong></p>
          <p><strong> <?= $garage['address']; ?> </strong></p>
          <p><strong> <?= $garage['description']; ?> </strong></p>
      </div>
      <a href="index.php?controller=garage&task=show&id=<?= $garage['id']; ?>" class="btn btn-success">voir ce garage</a>
      <a href="index.php?controller=garage&task=suppr&id=<?= $garage['id']; ?>" class="btn btn-danger">Supprimer ce garage</a>
      <hr>



  <?php } ?>