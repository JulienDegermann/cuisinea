<?php

class Reciepe
{
  public $id;
  public $title;
  public $ingredients;
  public $image;
  public $instructions;

  function __construct(int $id, string $title, string $ingredients, string $instructions, string $image = null)
  {
    $this->id = $id;
    $this->title = $title;
    $this->ingredients = $ingredients;
    $this->image = $image ? _UPLOADS_IMG_DIR_.$image : _ASSETS_IMG_DIR_.'recipe_default.jpg';
    $this->instructions = $instructions;
  }

  function getReciepeById(PDO $pdo, int $id)
  {
    $sql = "SELECT FROM reciepes WHERE id = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt = null;
    return $result;
  }

  function view_list()
  {
    require 'templates/partial_reciepe_list.php';
  }
};
function getAllReciepes(PDO $pdo, int|null $limit=null)
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
