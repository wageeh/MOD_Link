<?php
header("Content-Type:application/json");
//print_r($_GET);
if (isset($_GET['n_id']) && $_GET['n_id']!="") {
	$national_id = $_GET['n_id'];
	// random function with 95% prpaobility the user will pass
	$result = rand(0,100);
	if($result<96)
	{
		$person = new stdObject();
		$person->n_id = $national_id;
		$person->age = 22;
		// have 1 or more brother 
		$person->brotherstatus = 1;
		// his dad still living
		$person->dadstatus = 1;
		response($national_id,$person, 200, 'Accepted');
	}
	else{
		$person = new stdObject();
		$person->n_id = $national_id;
		$person->age = 32;
		// have 1 or more brother 
		$person->brotherstatus = 0;
		// his dad still living
		$person->dadstatus = 0;
		response($national_id,$person, 200, 'Rejected, age and no brothers or dad');
	}
}
else{
	response(NULL, NULL, 400,"Invalid Request");
}

function response($id,$res,$response_code,$response_desc){
	$response['response_code'] = $response_code;
	$response['n_id'] = $id;
	$response['data'] = $res;
	$response['response_desc'] = $response_desc;	
	$json_response = json_encode($response);
	echo $json_response;
}

class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }
}

?>