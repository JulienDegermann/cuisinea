<?php
function stringToArray (string $string) {
  return explode(PHP_EOL, $string);
}


function getAllCategories (PDO $pdo) {
  $sql = "SELECT * FROM categories;";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function getCategoryById (PDO $pdo, int $id) {
  $sql = "SELECT name FROM categories WHERE id= :id;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}