<?php

    // Start session
    session_start();

    // Connect to server and select database
    $db = new mysqli("localhost", "webuser", "secret", "corporate");

    // User wants to view an article, retrieve it from database
    $stmt = $db->prepare("SELECT id, title, content FROM articles WHERE id = ?");

    $stmt->bind_param('i', $_GET['id']);

    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows == 1)
    {
      $stmt->bind_result($id, $title, $content);
      #stmt->fetch();
    }

    // Add article title and link to list
    $articleLink = "<a href='article.php?id={$id}'>{$title}</a>";

    if (! in_array($articleLink, $_SESSION['articles']))
        $_SESSION['articles'][] = $articleLink;

    // Display the article
    echo "<p>$title</p><p>$content</p>";

    // Output list of requested articles

    echo "<p>Recently Viewed Articles</p>";
    echo "<ul>";
    foreach($_SESSION['articles'] as $doc) {
      echo "<li>$doc</li>";
    }
    echo "</ul>";
?>
