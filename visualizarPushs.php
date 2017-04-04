<?PHP

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://onesignal.com/api/v1/notifications/218f03c0-6eae-4d67-9966-3b4cd2c33831?app_id=758b5520-4da5-4ebd-8709-f7782f014c88&limit=50&offset=0",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Basic ODUzMzM0NjMtMjNkNy00MzRmLTkyNjUtYzU1ZDJkOTcyMmZl",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

echo $response;
?>