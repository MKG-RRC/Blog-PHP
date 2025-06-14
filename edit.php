<?php
/*******  
 Name: Mark Kenneth Garcia  
 Date: 2025-06-13  
 Description: Show edit form  
*********/

require 'connect.php';
require 'authenticate.php';

// 1) Load the post for editing
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit('Post not found.');
}

$stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    http_response_code(404);
    exit('Post not found.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit “<?= htmlspecialchars($post['title'], ENT_QUOTES) ?>”</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <nav>
    <a class="tab" href="index.php">Home</a>
    <a class="tab" href="new.php">New Post</a>
    <a class="tab" href="show.php?id=<?= $post['id'] ?>">View</a>
  </nav>

  <h1>Edit Blog Post</h1>

  <!-- UPDATE form -->
  <form method="POST" action="update.php" style="margin-bottom:1em;">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">

    <label>
      Title<br>
      <input
        type="text"
        name="title"
        value="<?= htmlspecialchars($post['title'], ENT_QUOTES) ?>"
        required
      >
    </label>
    <br><br>

    <label>
      Content<br>
      <textarea name="content" rows="10" required><?= htmlspecialchars($post['content']) ?></textarea>
    </label>
    <br><br>

    <button type="submit" class="button update">Update Post</button>
  </form>

  <!-- DELETE form -->
  <form method="POST" action="delete.php" style="display:inline;">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">
    <button
      type="submit"
      class="button delete"
      onclick="return confirm('Are you sure you want to delete this post?');"
    >
      Delete Post
    </button>
  </form>
</body>
</html>
