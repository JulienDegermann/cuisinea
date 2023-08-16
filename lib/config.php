<?php


$networks = [
  'linkedin' => [
    'url' => 'https://www.linkedin.com/in/julien-degermann/',
    'logo' => 'linkedin.svg'
  ],
  'github' => [
    'url' => 'https://github.com/JulienDegermann?tab=repositories',
    'logo' => 'github.svg'
  ]
];


$menus = [
  'index.php' => 'Accueil',
  'reciepes.php' => 'Nos recettes',
  'new_reciepe.php' => 'Ajouter/Modifier une recette'
];

$pages = [
  'index.php' => 'Accueil',
  'reciepes.php' => 'Nos recettes',
  'new_reciepe.php' => 'Ajouter une recette',
  'login.php' => 'Connexion',
  'sign_in.php' => 'Inscription',
  'reciepe.php' => 'La recette'
];


$current_page = basename($_SERVER['SCRIPT_NAME']);


define('_UPLOADS_IMG_DIR_', 'uploads/images/');
define('_ASSETS_IMG_DIR_', 'assets/images/');


function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  // trim
  $text = trim($text, $divider);
  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);
  // lowercase
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}
