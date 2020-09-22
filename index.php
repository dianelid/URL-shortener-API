<?php
  $u = filter_input(INPUT_GET, "u", FILTER_SANITIZE_URL);
  if($u){
    require "controller.php";

    $db = new Controller();

    $params = array(
      ':short_url' => SITEURL . $u
    );

    $redirect = $db->EXE_QUERY("SELECT original_url FROM urls WHERE short_url = :short_url", $params);
    
    if($redirect[0]['original_url'] == "")
      echo "Invalid URL";
    else
      Header("Location: " . $redirect[0]['original_url']);
  }
?>