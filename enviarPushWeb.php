<?PHP

	function sendMessage(){
		$content = array(
			// AQUI COLOCA A MENSAGEM DO PUSH
			"en" => 'Messagem 2'
			);
		
		$fields = array(
			'app_id' => "fffb82f4-b11a-4366-9102-b80e685621ae", // AQUI INSERE O APP ID DO ONE SIGNAL
			'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
			'contents' => $content,
			'headings' => array( "en" => 'Titulo 2')//AQUI SETA O TITULO DO PUSH
		);
		
		$fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic ODAyNzQyYmItYjZiZS00ZjcwLWJkYWMtMjRjMWI0ZDVlMWE2')); // AQUI COLOCA A API REST KEY DO ONE SIGNAL
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