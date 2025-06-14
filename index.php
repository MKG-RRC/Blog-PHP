<?php
/*******w******** 
    Name: Mark Kenneth Garcia
    Date: 2025-06-13
    Description: This is the index file of the app
****************/

require 'connect.php';

$posts = $db
  ->query("SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC LIMIT 5")
  ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
  <title>Home</title>
</head>
<body>
  <h1>  <img src="icons/favicon.png" alt="">
Welcome to my Blog!</h1>
<hr>
  <nav>
    <a class="tab" href="index.php">Home</a>
    <a class="tab" href="new.php">New Post</a>
  </nav>

  <?php foreach ($posts as $p): ?>
    <article>
      <h2><a href="show.php?id=<?= $p['id'] ?>">
        <?= htmlspecialchars($p['title']) ?></a></h2>

      <p class="meta">
        <?= date('F j, Y, g:i a', strtotime($p['created_at'])) ?>
        – <a href="edit.php?id=<?= $p['id'] ?>">edit</a>
      </p>

      <p>
        <?= nl2br(htmlspecialchars(substr($p['content'],0,200))) ?>…
        <a href="show.php?id=<?= $p['id'] ?>">Read more</a>
      </p>
    </article>
  <?php endforeach; ?>
</body>
</html>
