<?php include 'conexao.php';

  if (!isset($_GET['h'])) 
    die('URL inválida');

  $hash = $conn->real_escape_string($_GET['h']);

  $query = "SELECT * FROM urls WHERE id = '$hash'";

  $result = $conn->query($query) or die($conn->error);

  $row = $result->fetch_assoc();

  if (!$row)  
    die('URL inválida');

  $conn->query("UPDATE urls SET views = views + 1 WHERE id = '$hash'") or die($conn->error);

  header('Location: ' . $row['url']);

  

?>