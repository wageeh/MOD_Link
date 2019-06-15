<?php
header("Content-Type:application/json");
//print_r($_GET);
if (isset($_GET['n_id']) && $_GET['n_id']!="") {
	$national_id = $_GET['n_id'];
	// random function with 95% prpaobility the user will pass
	$result = rand(0,100);
	if($result<96)
	{
		response($national_id,0, 200, 'No criminal record found');
	}
	else{
		response($national_id,1, 200, 'Criminal record found');
	}
}
else if (isset($_GET['date']) && $_GET['date']!="")	{
	$date = $_GET['date'];
	$data = array();
	for($x = 0; $x <= 10; $x++){
		$person = new stdObject();
		$person->n_id = $x;
		$person->name = 'person '.$x;
		$person->city = 'Cairo';
		$data[] = $person;
	}
	responseListByDate($date,$data,200);
	//echo $date;
}else{
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

function responseListByDate($date,$data,$response_code){
	$response['response_code'] = $response_code;
	$response['date'] = $date;
	$response['data'] = json_encode($data);	
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