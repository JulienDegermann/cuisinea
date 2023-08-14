<div class="col-lg-4 p-1">
  <div class="card ">
    <img src="<?= $this->image; ?>" class="card-img-top" alt="<?= $this->title; ?>">
    <div class="card-body">
      <h5 class="card-title"><?= $this->title; ?></h5>
      <!-- <p><?= $this->description; ?></p> -->
      <p><span class="badge btn btn-primary"><?= $this->category_id; ?></span></p>
      <a href="reciepe.php?id=<?= $this->id; ?>" class="btn btn-primary">Voir la recette</a>
    </div>
  </div>
</div>