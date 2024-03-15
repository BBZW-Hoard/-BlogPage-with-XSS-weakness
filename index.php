<!DOCTYPE html>
<html>

<head>
  <title>Blog Kommentare</title>
</head>

<body>

  <h2>Kommentare</h2>

  <?php
  // Laden der Kommentare aus der JSON-Datei
  $comments_file = './db/comments.json';
  $comments = json_decode(file_get_contents($comments_file), true);

  // Zeige die Kommentare an
  if (!empty($comments)) {
    foreach ($comments as $comment) {
      echo "<p><strong>{$comment['author']}</strong>: {$comment['comment']}</p>";
    }
  } else {
    echo "<p>Keine Kommentare vorhanden.</p>";
  }
  ?>

  <hr>

  <!-- Kommentarformular -->
  <h3>Kommentar hinzufügen</h3>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Autor: <input type="text" name="author"><br>
    Kommentar: <input type="text" name="comment"><br>
    <input type="submit" value="Kommentar hinzufügen">
  </form>

  <?php
  // Füge neuen Kommentar hinzu
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['author'] == "" || $_POST['comment'] == "") {
      echo "<p>Bitte füllen Sie alle Felder aus!</p>";
      return;
    }

    $newComment = ['author' => $_POST['author'], 'comment' => $_POST['comment']];
    $comments[] = $newComment;

    // Speichern der Kommentare in der JSON-Datei
    file_put_contents($comments_file, json_encode($comments));
  }
  ?>

</body>

</html>