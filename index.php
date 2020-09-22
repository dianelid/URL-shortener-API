<?php
  $u = filter_input(INPUT_GET, "u", FILTER_SANITIZE_URL);

  if($u){
    require "controller.php";

    $db = new Controller();

    $paramsUrl = array(
      ':short_url' => SITEURL . $u
    );
    $redirect = $db->EXE_QUERY("SELECT original_url, access FROM urls WHERE short_url = :short_url", $paramsUrl);

    $paramAccess = array(
      ':short_url' => SITEURL . $u,
      ':access' => $redirect[0]['access'] + 1
    );
    $db->EXE_NON_QUERY(
      "UPDATE urls SET access = :access WHERE short_url = :short_url",
      $paramAccess
    );

    if($redirect[0]['original_url'] == "")
      echo "Invalid URL";
    else
      Header("Location: " . $redirect[0]['original_url']);
  }
?>