<?php
/*******  
 Name: Mark Kenneth Garcia  
 Date: 2025-06-13  
 Description: Delete a blog post and return to list  
*********/

require 'connect.php';
require 'authenticate.php';

// Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method Not Allowed');
}

// Validate the incoming ID
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(400);
    exit('Invalid post ID.');
}

// Delete the post
$stmt = $db->prepare("DELETE FROM posts WHERE id = ?");
$stmt->execute([$id]);

// Redirect back to the main blog listing
header('Location: index.php');
exit;
