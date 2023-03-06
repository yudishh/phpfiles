<h1>TESTING</h1>
<?php 
	// header("Content-Type:application/json");	
	include("bookFunctions.php");
	
	
	if(!empty($_GET['title']) && !empty($_GET['f'])){
		$title = getAllDetails($_GET['title']); 
		$format = ($_GET['f']);			
		
		
		if(empty($title)){
			deliver_responseJSON('200', 'No Book Found', null);
			echo ($myArr."\n\n"); // display error "no book found".
		}
		elseif (!empty($title) && $format == 'json'){
			deliver_responseJSON('200', 'Book found', $title);
			echo ($myArr."\n\n"); // output data the json.
		}
		elseif(!empty($title) && $format == 'xml'){
			deliver_responseXML($title);
			echo $xml_dataaaa;
			session_start();
			$_SESSION['xmlData'] = ($xml_dataaaa);
			
		}
		
	}	
	else{
		deliver_responseJSON('400', 'Bad Request', null);	
		echo ($myArr); // display error in JSON.		
	}		  
	
	
	//*********************** JSON RESPONSE VERSION *********************//
	function deliver_responseJSON($status, $statusMessage, $data){
		header("HTTP/1.1 $status $statusMessage");
		
		
		$response['status']=$status;
		$response['status_message']=$statusMessage;
		$response['data']=$data;
		
		$json_response=json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK); 
		
		global $myArr; // declare a global variable.
		$myArr = $json_response;  //assign JSON result in global variable.
	}	
	
	//*********************** XML RESPONSE VERSION *********************//
	function deliver_responseXML($title){
		
		$xml = new SimpleXMLElement('<root/>');
		array_walk_recursive($title, function($value, $key) use ($xml) {
			$xml->addChild($key, $value);
		});
		$xml_output = htmlspecialchars($xml->asXML());
		
		global $xml_dataaaa;  // declare a global variable.
		$xml_dataaaa=$xml_output; //assign XML result in global variable.
		
	}
	
	
	
?>
