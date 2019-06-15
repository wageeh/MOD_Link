<?php

?>
<html>
<head>
<title>Demo Create and Consume Simple REST API in PHP - AllPHPTricks.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Create and Consume Simple REST API in PHP</h3>   
<form action="" method="POST">
<label>Enter national ID:</label><br />
<input type="text" name="n_id" placeholder="Enter national ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>    

<?php
if (isset($_POST['n_id']) && $_POST['n_id']!="") {
	$n_id = $_POST['n_id'];
	$url = "http://localhost:8090/interior/api/".$n_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	
	echo "<table>";
	echo "<tr><td>National ID:</td><td>$result->n_id</td></tr>";
	echo "<tr><td>Result:</td><td>$result->res</td></tr>";
	echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
	echo "<tr><td>Response Desc:</td><td>$result->response_desc</td></tr>";
	echo "</table>";
}
    ?>


</div>
</body>
</html>