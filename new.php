<?php
require 'authenticate.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Post – My Blog</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <header>
    <h1>Create a New Blog Post</h1>
    <nav>
      <a class="tab" href="index.php">Home</a>
    </nav>
  </header>

  <main>
    <form method="POST" action="create.php">
      <label>
        Title<br>
        <input type="text" name="title" required>
      </label>
      <br><br>
      <label>
        Content<br>
        <textarea name="content" rows="10" required></textarea>
      </label>
      <br><br>
      <button id="submit" type="submit">Publish Your Blog</button>
      <a href="index.php">Cancel</a>
    </form>
  </main>

  <footer>
    <p>Copywrong <?= date('Y') ?> – No Rights Reserved</p>
  </footer>
</body>
</html>
