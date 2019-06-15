<?php
header("Content-Type:application/json");
//print_r($_GET);
if (isset($_GET['n_id']) && $_GET['n_id']!="") {
	$national_id = $_GET['n_id'];
	// random function with 95% prpaobility the user will pass
	$result = rand(0,100);
	if($result<24)
	{
		response($national_id,1, 200, 'Engineering');
	}else if($result<48){	
		response($national_id,1, 200, 'Medicine');	
	}else if($result<72){	
		response($national_id,1, 200, 'Accounting');		
	}else if($result<96){	
		response($national_id,1, 200, 'Law');	
	}
	else{
		response($national_id,0, 200, 'Still studing');
	}
}
else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($id,$res,$response_code,$response_desc){
	$response['response_code'] = $response_code;
	$response['n_id'] = $id;
	$response['res'] = $res;
	$response['response_desc'] = $response_desc;	
	$json_response = json_encode($response);
	echo $json_response;
}

?>