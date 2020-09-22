<?php
  require "controller.php";

  //get post data
  $data = json_decode(file_get_contents('php://input'), true);
  /*$data = '{
    "name": "Lidiane"
  }';*/
  
  $db = new Controller();

  $params = array(
    ':name' => $data['name']
  );

  $dados = $db->EXE_NON_QUERY(
    "INSERT INTO users (id, name)
    VALUES (NULL, :name)",
    $params
  );

  if($dados) {
    $result = array(
      'user' => array(
        'name' => $data['name']
      )
    );

    echo json_encode($result, JSON_PRETTY_PRINT);
  } else {
    echo "Não foi posível criar o usuário!";
  }
?>