<?php
// show.php — display a single post in full

require 'connect.php';

// 1) Get & validate the post ID from the querystring
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit("Post not found");
}

// 2) Fetch that post
$stmt = $db->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$post) {
    http_response_code(404);
    exit("Post not found");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Mark– <?= htmlspecialchars($post['title']) ?></title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <header>
    <h1>Mark – <?= htmlspecialchars($post['title']) ?></h1>
    <nav>
      <a class="tab" href="index.php">Home</a>
      <a class="tab" href="new.php">New Post</a>
    </nav>
  </header>

  <section class="post-full">
    <article>
      <h2><?= htmlspecialchars($post['title']) ?></h2>
      <p class="meta">
        <?= date('F j, Y, g:i a', strtotime($post['created_at'])) ?>
        – <a href="edit.php?id=<?= $post['id'] ?>">edit</a>
      </p>
      <div class="content">
        <?= nl2br(htmlspecialchars($post['content'])) ?>
      </div>
    </article>
  </section>

  <footer>
    <p>Copywrong <?= date('Y') ?> – No Rights Reserved</p>
  </footer>
</body>
</html>
