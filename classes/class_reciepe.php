<?php

class Reciepe
{
  public $id;
  public $title;
  public $ingredients;
  public $image;
  public $instructions;
  public $description;
  public $category;

  function __construct(int $id, string $title, string $description, string $ingredients, string $instructions, string $category = null, $image = null)
  {
    $this->id = $id;
    $this->title = $title;
    $this->ingredients = $ingredients;
    $this->image = $image ? _UPLOADS_IMG_DIR_ . $image : _ASSETS_IMG_DIR_ . 'recipe_default.jpg';
    $this->instructions = $instructions;
    $this->description = $description;
    $this->category = $category;
  }

  function view_list()
  {
    require 'templates/partial_reciepe_list.php';
  }
  function view_detail()
  {
    require 'templates/reciepe_detail.php';
  }
};

// $pdo functions
function getAllReciepes(PDO $pdo, int $limit = null)
{
  $sql = "SELECT * FROM recipes ORDER BY id DESC ";
  $sql .= $limit ? 'LIMIT :limit;' : ';';
  $stmt = $pdo->prepare($sql);
  if ($limit) {
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
  }
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function getReciepeById(PDO $pdo, int $id)
{
  $sql = "SELECT * FROM recipes WHERE id = :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function new_reciepe(PDO $pdo,  $title, int $category,  $description,  $ingredients,  $instructions, string|null $image = null)
{
  $sql = "INSERT INTO recipes (title, category_id, description, ingredients, instructions, image) VALUES (:title, :category_id, :description, :ingredients, :instructions, :image);";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
  $stmt->bindParam(':category_id', $category, PDO::PARAM_INT);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':ingredients', $ingredients, PDO::PARAM_STR);
  $stmt->bindParam(':instructions', $instructions, PDO::PARAM_STR);
  $stmt->bindParam(':image', $image, PDO::PARAM_STR);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}
