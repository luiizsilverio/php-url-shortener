<?php include 'conexao.php';

$url = false;

if (isset($_POST['url'])) {
  $hash = uniqid();
  $url = $conn->real_escape_string($_POST['url']);
  $views = 0;
  $url_prefix = 'http://localhost/shortener/r.php?h=';

  $conn->query("INSERT INTO urls (id, url, views) VALUES ('$hash', '$url', $views)") or die($conn->error);
  
  $url = $url_prefix . $hash;
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP URL Shortener</title>
</head>
<body>
  <form action="" method="POST">
    <input type="text" name="url" placeholder="Digite a URL aqui" />
    <button type="submit">Encurtar!</button>
  </form>

  <?php if ($url !== false) { ?>
    <p>
      URL encurtada<br>
      <input type="text" readonly name="url" value="<?= $url; ?>">
    </p>
  <?php } ?>
</body>
</html>