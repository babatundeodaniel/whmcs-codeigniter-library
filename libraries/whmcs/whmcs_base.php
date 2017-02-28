<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* WHMCS API
*
* @author    Joe Parihar
 * @updated     Daniel Babatunde https://github.com/babatundeodaniel
* @version   v1.0.1
* @copyright 2013
*/


define('WHMCS_URL', 'https://upperlinkwhmcs.ng/clients/includes/api.php');
define('WHMCS_USERNAME', 'dab'); // username
define('WHMCS_PASSWORD', 'invention11.'); //password should be in md5
define('WHMCS_ACCESS_KEY', 'UPL#@CC3ssK3Y'); //Access key

class Whmcs_base{

		function send_request($params = array()){

		if ( ! isset($params['action'])) {
	      trigger_error("No API action set");
	      exit;
	    }

	    if ( ! defined('WHMCS_USERNAME') || ! defined('WHMCS_PASSWORD') || ! defined('WHMCS_URL')) {
	      trigger_error("Must set WHMCS_USERNAME, WHMCS_PASSWORD, and WHMCS_URL constants");
	      exit;
	    }

	    if(!defined('WHMCS_ACCESS_KEY')){
            trigger_error("Kindly define the api access  key else WHMCS will not allow access nigga!");
            exit;
        }

	    $url=WHMCS_URL;
	    $params['username'] = WHMCS_USERNAME;
	    $params['password'] = md5(WHMCS_PASSWORD);
	    $params['accesskey'] = WHMCS_ACCESS_KEY; //secrete key
		$params["responsetype"] = "json";
		 
		$query_string = http_build_query($params);
		//foreach ($params AS $k=>$v) $query_string .= "$k=".urlencode($v)."&";
        //print_r($query_string);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$jsondata = curl_exec($ch);
		if (curl_error($ch)) die("Connection Error: ".curl_errno($ch).' - '.curl_error($ch));
		curl_close($ch);



		//print_r($arr); # Output XML Response as Array


		#Debug Output - Uncomment if needed to troubleshoot problems
            /*
		echo "<textarea rows=50 cols=100>Request: ".print_r($query_string,true);
		echo "\nResponse: ".htmlentities($jsondata)."\n\nArray: ".print_r(json_decode($jsondata),true);
		echo "</textarea>";
            */

		return json_decode($jsondata); # Decode JSON String

	}	
}