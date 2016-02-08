<?php

/*
	Utility operation e.g. Debug to Console, 
*/

class Utils{

	static function debug_to_console( $data ) {

	    if ( is_array( $data ) )
	        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	    
	    else
	        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

	    echo $output;
	}
	
	static function sanitize($dirty){
		 $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
		 $pattern = '/[^a-zA-Z0-9'  . $whiteSpace . ']/u';
    	 $cleared = preg_replace($pattern, '', (string) $dirty);
    	 return trim($cleared);
	}

	/**
	 * Trace function which outputs variables to system/log/output.php file
	 */
	static function trace($var,$append=true){
		
	    // $oldString="<?php\ndie();/*";
	    if($append){
	        file_put_contents(ROOT . 'system/log/access.log', $var , FILE_APPEND);
	    }

	    file_put_contents(ROOT . 'system/log/access.log', $var . PHP_EOL);
	}


	static function httpGet($endpoint){
		//next example will recieve all messages for specific conversation
		$curl = curl_init($endpoint);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);

		if ($curl_response === false) {
		    $info = curl_getinfo($curl);
		    curl_close($curl);
		    die('error occured during curl exec. Additioanl info: ' . var_export($info));
		}

		curl_close($curl);

		$decoded = json_decode($curl_response,true);

		Utils::trace($endpoint . ' response ok!');
		return $decoded;

	}

	/*
		HTTP Post or Put
		$data - json_encoded
		$endpoint - endpoint of API
	*/

	static function httpPost($endpoint, $data){
		                                                                                                                     
		$ch = curl_init($endpoint); 

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($jsonData))                                                                       
		);                                                                                                                   
		                                                                                                                     
		$result = curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$decoded = json_decode($result);
		var_export($decoded);
	}

	static function httpPut($endpoint, $data){

		//next eample will change status of specific conversation to resolve
		$service_url = $endpoint;
		$ch = curl_init($service_url);
		 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($jsonData));
		$response = curl_exec($ch);

		if ($response === false) {
		    $info = curl_getinfo($ch);
		    curl_close($ch);
		    die('error occured during curl exec. Additioanl info: ' . var_export($info));
		}

		curl_close($ch);

		$decoded = json_decode($response);
		if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
		    die('error occured: ' . $decoded->response->errormessage);
		}
		echo 'response ok!';
		var_export($decoded);

	}

	static function httpDelete($endpoint, $jsonData){

		$ch = curl_init($endpoint);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);

		$response = curl_exec($ch);
		if ($curl_response === false) {
		    $info = curl_getinfo($curl);
		    curl_close($curl);
		    die('error occured during curl exec. Additioanl info: ' . var_export($info));
		}
		curl_close($curl);

		$decoded = json_decode($curl_response, true);
		echo 'response ok!';
		var_export($decoded);


	}


}

