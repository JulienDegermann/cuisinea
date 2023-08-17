<?php
require_once 'lib/function.php';
require_once 'lib/pdo.php';
?>

<div class="col-lg-4 p-1">
  <div class="card ">
    <img src="<?= $this->image; ?>" class="card-img-top" alt="<?= $this->title; ?>">
    <div class="card-body position-relative">
      <h5 class="card-title"><?= $this->title; ?></h5>
      <span class="badge bg-primary position-absolute" style="top 10px; right: 10px"><?= $this->category; ?></span>
      <!-- <p><?= $this->description; ?></p> -->
      <a href="recette/<?= $this->id; ?>" class="btn btn-primary">Voir la recette</a>
    </div>
  </div>
</div>