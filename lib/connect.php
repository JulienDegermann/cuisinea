<?php
session_start();
require_once '../classes/class_users.php';
require_once 'function.php';
require_once 'pdo.php';

if (isset($_POST['connect'])) {
  // set cookies
  if (isset($_POST['remember'])) {
    setcookie('email', $_POST['email'], time() + (24 * 3600 * 365), '/');
    setcookie('password', $_POST['password'], time() + (24 * 3600 * 365), '/');
  } else {
    setcookie('email', $_POST['email'], time() - 3600, '/');
    setcookie('password', $_POST['password'], time() - 3600, '/');
  }

  // try to connect
  if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $errors[] = 'Un champ est manquant';
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = getUserByEmail($pdo, $email);
    if (!$result) {
      $errors[] = 'E-mail ou mot de passe incorrect';
    } else {
      if ($result['email'] == $email && password_verify($password, $result['password'])) {
        $current_user = new Users(
          $result['id'],
          $result['first_name'],
          $result['last_name'],
          $result['email'],
          $result['password']
        );
        $successes[] = 'Le mot de passe et l\'identifiant sont corrects';
        $current_user->connectUser();
      } else {
        $errors[] = 'E-mail ou mot de passe incorrect';
      }
    }
  }
}
if ($errors) {
  $_SESSION['errors'] = $errors;
  header('location: ../login.php');
}
if ($successes && $current_user) {
  $_SESSION['successes'] = $successes;
  header('location: ../index.php');
}

