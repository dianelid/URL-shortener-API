<?php
  require "controller.php";

  $db = new Controller();

  $params = array(
    ':original_url' => $_GET['url']
  );

  $dados = $db->EXE_QUERY("SELECT * FROM  urls WHERE original_url = :original_url", $params);

  echo json_encode($dados, JSON_PRETTY_PRINT);
?>