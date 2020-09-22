<?php

  require "gestor.php";

  $db = new Gestor();

  $params = array(
    ':id_user' => $_GET['id_user']
  );

  $dados = $db->EXE_QUERY("SELECT original_url, short_url FROM  urls WHERE id_user = :id_user", $params);

  echo json_encode($dados, JSON_PRETTY_PRINT);