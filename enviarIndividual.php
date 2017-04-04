<?PHP
	function sendMessage(){
		$content = array(
			"en" => 'Teste de envio individual para Harlan'
			);
		
		$fields = array(
			'app_id' => "758b5520-4da5-4ebd-8709-f7782f014c88",
			'include_player_ids' => array("c2d9ccd8-954d-40e3-af45-20790a8b3d89"),
			'data' => array("foo" => "bar","sender_id" => "igor","receiver_id" => "harlan"),
			'contents' => $content,
			'headings' => array( "en" => 'Envio Individual Harlan')//AQUI SETA O TITULO DO PUSH
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ODUzMzM0NjMtMjNkNy00MzRmLTkyNjUtYzU1ZDJkOTcyMmZl'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}
	
	$response = sendMessage();
	$return["allresponses"] = $response;
	$return = json_encode( $return);
	
	print("\n\nJSON received:\n");
	print($return);
	print("\n");
?>