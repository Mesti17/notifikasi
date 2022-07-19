<?php

$pesan  = $_POST['pesan'];
$no_wa  = $_POST['no_key'];
$key_api = $_POST['key'];

$curl = curl_init();

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://panel.rapiwha.com/send_message.php?apikey=RQQDZNGZPUNGTAQE2D98&number=$6281372151728&text=$pesan",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",

));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if(isset($_POST['kirim'])){
if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
}
?>