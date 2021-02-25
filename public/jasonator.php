 <?php  
	//CORS
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	header('Access-Control-Allow-Credentials: true');
	//JSON
	header('Content-Type: application/json');
 	$message = '';  
 
	if( file_exists('0.json') ) {  
		if ( isset($_POST['author']) && isset($_POST['timestamp']) && isset($_POST['content']) ) {
			//append json to file
			$current_data = file_get_contents('0.json');  
			$array_data = json_decode($current_data, true);  
			$extra = array(  
				 'author'    =>  $_POST['author'],  
				 'timestamp' =>  $_POST["timestamp"],  
				 'content'   =>  $_POST["content"]  
			);  
			$array_data[] = $extra;  
			$final_data = json_encode($array_data);  
			if(file_put_contents('0.json', $final_data)) {  
				 $message = $final_data;  
			} 
		}
		else {
			//just return the json
			$current_data = file_get_contents('0.json');  
			$message = $current_data;
		} 
	}  
	else  {  
		$message = 'JSON File not exits';  
	}  
    echo $message;
 ?> 