<?php
require_once 'templates/header.php';
require_once 'classes/class_reciepe.php';
require_once 'lib/function.php';
$errors = [];
$successes = [];


//get inputs values if error not to complete all
if (isset($_POST['title'])) {

  $title = $_POST['title'];
  $description = $_POST['description'];
  $ingredients = $_POST['ingredients'];
  $instructions = $_POST['instructions'];
  $category = $_POST['category'];
  $image = $_FILES['image']['tmp_name'];
  if ($image) {
    if (getimagesize($image)) {
      $image_name = slugify(uniqid() . '_' . $_FILES['image']['name']);
      move_uploaded_file($image, _UPLOADS_IMG_DIR_ . $image_name);
    } else {
      $errors[] = 'Le fichier n\'est pas une image';
    }
  }
  if (!$errors) {
    $result = new_reciepe($pdo, $title, $category, $description, $ingredients, $instructions, isset($image_name) ? $image_name : null);
  }
  if (isset($result)) {
    if ($result) {
      $successes[] = 'La recette a été ajoutée !';
    }
  } else {
    $errors[] = 'Erreur : la recette n\'a pas été ajoutée';
  }
}
?>
<?php
if (!isset($_SESSION['user'])) { ?>
  <h1 class="text-center position-absolute top-50 start-50 translate-middle">OOPS… Vous n'êtes pas connecté</h1>
<?php } else { ?>
  <section class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row align-items-center g-5 py-5">
      <h1 class="text-center">Ajouter une recette</h1>
      <?php
      foreach ($errors as $error) { ?>
        <div class="my-1 alert alert-danger" role="alert">
          <?= $error; ?>
        </div>
      <?php }

      foreach ($successes as $success) { ?>
        <div class="my-1 alert alert-success" role="alert">
          <?= $success; ?>
        </div>
      <?php } ?>

      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="title" class="form-label">Titre *</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $errors ? $title : ''; ?>" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description *</label>
          <textarea name="description" class="form-control" id="description" cols="30" rows="5" required><?= $errors ? $description : ''; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="ingredients" class="form-label">Ingrédients *</label>
          <textarea name="ingredients" class="form-control" id="ingredients" cols="30" rows="5" required><?= $errors ? $ingredients : ''; ?></textarea></textarea>
        </div>
        <div class="mb-3">
          <label for="instructions" class="form-label">Instructions *</label>
          <textarea name="instructions" class="form-control" id="instructions" cols="30" rows="5" required><?= $errors ? $instructions : ''; ?></textarea></textarea>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label" required>Catégorie *</label>
          <select class="form-select" name="category" id="category" aria-label="Default select example">
            <?php
            $categories = getAllCategories($pdo);
            foreach ($categories as $categorie) { ?>
              <option <?php
                      if (isset($category)) {
                        echo $category == $categorie['id'] ? 'selected' : '';
                      } ?> value="<?= $categorie['id']; ?>"><?= $categorie['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input class="form-control" type="file" name="image" id="image">
        </div>
        <p>* obligatoires</p>
        <button type="submit" class="btn btn-primary">Enregister</button>
      </form>
    </div>
  </section>
<?php } ?>


<?php require_once 'templates/footer.php'; ?>