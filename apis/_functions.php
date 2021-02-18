<?php
	/* NAO ALTERAR ESTES PARAMETROS */
	session_name('bscommerce_apis');
	session_cache_expire(180);
	session_set_cookie_params(['samesite' => 'None']);
	session_start();

	$config['cookie_secure'] = TRUE;

	// token api da loja
	$tokenapi = "7b388be5-6895-11eb-a4d4-00163ece1990";
	$shopcode = "60";

	function getUUID() {
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		mt_rand(0, 0xffff), mt_rand(0, 0xffff),
		mt_rand(0, 0xffff),
		mt_rand(0, 0x0fff) | 0x4000,
		mt_rand(0, 0x3fff) | 0x8000,
		mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
		);
	}

	function callAPI($url, $data){
		$json = json_encode($data);
		$curl_handle = curl_init();
		curl_setopt($curl_handle, CURLOPT_URL, $url);
		curl_setopt($curl_handle, CURLOPT_POST, 1);
		curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $json);
		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array(
		  'Content-Type: application/json', 'Accept: application/json'
		));
	  curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	  $result = curl_exec($curl_handle);
	  if(!$result){die("Connection Failure");}
	  curl_close($curl_handle);
	  return $result;
	}

	if(!isset($_SESSION['userid'])){
		$_SESSION['lojaid'] 	= $shopcode;
		$_SESSION['userid'] 	= 0;
		$_SESSION['username'] = '';
		$_SESSION['useruuid'] = getUUID();
		setcookie("loja-id", $_SESSION['lojaid'], (time() + (30 * 86400)), "/");
		setcookie("user-id", $_SESSION['userid'], (time() + (30 * 86400)), "/");
		setcookie("user-name", $_SESSION['username'], (time() + (30 * 86400)), "/");
		setcookie("user-uuid", $_SESSION['useruuid'], (time() + (30 * 86400)), "/");
	}
	
	if(isset($_COOKIE['user-id']) && ($_SESSION['userid'] == 0)) {
		$_SESSION['lojaid'] 	= $_COOKIE['loja-id'];   // codigo da loja
		$_SESSION['userid'] 	= $_COOKIE['user-id'];   // codigo do cliente
		$_SESSION['username'] = $_COOKIE['user-name']; // nome do cliente
		$_SESSION['useruuid'] = $_COOKIE['user-uuid']; // uuid do cliente
	}

	function getLogoff(){
		session_regenerate_id();	
		unset($_SESSION['lojaid']);
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		unset($_SESSION['useruuid']);
		setcookie("loja-id", '', (time() - 3600), "/");
		setcookie("user-id", '', (time() - 3600), "/");
		setcookie("user-name", '', (time() - 3600), "/");
		setcookie("user-uuid", '', (time() - 3600), "/");
		return true;
	}
?>
