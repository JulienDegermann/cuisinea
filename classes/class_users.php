<?php

class Users
{
  public $id;
  public $first_name;
  public $last_name;
  public $email;
  public $password;
  public $role;

  function __construct(int $id, string $first_name, string $last_name, string $email, string $password, string $role = 'subscriber')
  { 
    $this->id = $id;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_DEFAULT);
    $this->role = $role;
  }

  function connectUser()
  {
    session_destroy();
    session_unset();
    session_start();
    $_SESSION['user'] = [
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'status' => 'connected'
    ];
    header('location: index.php');
  }
};

// $pdo functions
function getUserById(PDO $pdo, int $id)
{
  $sql = "SELECT * FROM users WHERE id = :id ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function getUserByEmail(PDO $pdo, string $email)
{
  $sql = "SELECT * FROM users WHERE email = :email;";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = null;
  return $result;
}

function newUser(PDO $pdo,  string $first_name, string $last_name, string $email, string $password, string $role = 'subscriber' )
{
  $sql = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (:first_name, :last_name, :email, :password, :role);";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->bindParam(':role', $role, PDO::PARAM_STR);
  $result = $stmt->execute();
  $stmt = null;
  return $result;
}
