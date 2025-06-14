<?php
/*******  
 Name: Mark Kenneth Garcia  
 Date: 2025-06-13  
 Description: Process edit form and update a blog post  
*********/

require 'connect.php';
require 'authenticate.php';

// 1) Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// 2) Validate inputs
$id      = filter_input(INPUT_POST,  'id',      FILTER_VALIDATE_INT);
$title   = trim($_POST['title']   ?? '');
$content = trim($_POST['content'] ?? '');

if (!$id || $title === '' || $content === '') {
    http_response_code(400);
    exit('Invalid form data.');
}

// 3) Perform update (no `updated` column)
$stmt = $db->prepare("
    UPDATE posts
       SET title   = ?,
           content = ?
     WHERE id = ?
");
$stmt->execute([$title, $content, $id]);

// 4) Redirect back to the blog listing
header('Location: index.php');
exit;
