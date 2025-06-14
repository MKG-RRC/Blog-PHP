<?php
// create.php
require 'authenticate.php';
require 'connect.php';

// Grab and trim inputs
$title   = trim($_POST['title']   ?? '');
$content = trim($_POST['content'] ?? '');

// Server-side validation
if ($title === '' || $content === '') {
    exit("Error: Title and content cannot be empty.");
}

// Insert into the database
$stmt = $db->prepare("
  INSERT INTO posts (title, content)
  VALUES (:title, :content)
");
$stmt->execute([
    ':title'   => $title,
    ':content' => $content
]);

// Redirect to the home page
header('Location: index.php');
exit;
