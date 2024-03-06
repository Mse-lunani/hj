<?php
date_default_timezone_set('Africa/Nairobi');
try {
  include 'operations.php';
  $conn = connect();
  $response = file_get_contents('php://input');
  if ($response === false) {
      throw new Exception('Failed to get input');
  }
  $file = "res.txt";
  $response2 = json_decode($response,true);
  if (json_last_error() !== JSON_ERROR_NONE) {
      throw new Exception('Failed to decode JSON: ' . json_last_error_msg());
  }
  $write = fopen($file, "a");
  if ($write === false) {
      throw new Exception('Failed to open file');
  }
  fwrite($write, $response);
  $response2 = json_decode($response,true);
  if (json_last_error() !== JSON_ERROR_NONE) {
      throw new Exception('Failed to decode JSON: ' . json_last_error_msg());
  }
  foreach($response2 as $key=>$item){
      $response2[$key] = mysqli_real_escape_string($conn,$item);
  }
  $response2['date_create'] = date("Y-m-d H:i:s");

  build_sql_insert("pa",$response2);
  fwrite($write, "\n\nresponse after curl request of $url: ".json_encode($res)."\n\n");
}catch (Exception $e) {
 error_log("[".date("Y-m-d H:i:s") . "]: " . $e->getMessage() . "\n\n", 3, 'error_log');
}
?>