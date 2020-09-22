<?php
  require "controller.php";

  //get post data
  $data = json_decode(file_get_contents('php://input'), true);
  /*$data = '{
    "url": "https://www.hotmail.com.br",
    "id_user": 1
  }';*/
  
  $db = new Controller();

  $short_url = SITEURL . $db->GetRandomString(URLLENGTH);

  $params = array(
      ':original_url' => $data['url'],
      ':short_url' => $short_url,
      ':id_user' => $data['id_user']
  );

  $dados = $db->EXE_NON_QUERY(
    "INSERT INTO urls (id, original_url, short_url, created_time, id_user)
    VALUES (NULL, :original_url, :short_url, CURRENT_TIMESTAMP, :id_user)",
    $params
  );

  if($dados) {
    $result = array(
      'url' => array(
        'original' => $data['url'],
        'short' => $short_url,
        'id_user' => $data['id_user']
      )
    );

    echo json_encode($result, JSON_PRETTY_PRINT);
  } else {
    echo "Não foi posível encurtar a url!";
  }