<?php 

namespace RifkyEkayama\Twillio\Verify;

/**
* Twillio Verify Endpoints
*
* @author Rifky Ekayama <rifky.ekayama@gmail.com>
*/
class RESTClient {

	private $endpoint;
	private $api_key;
	private $api_url;

	public function __construct($api_key, $endpoint) {
		$this->api_key = $api_key;
		$this->endpoint = $endpoint;
		$this->api_url = "https://api.authy.com/protected/json/phones/verification";
	}

	/**
	 * HTTP POST method
	 *
	 * @param array Parameter yang dikirimkan
	 * @return string Response dari cURL
	 */
	public function post($params) {
		$curl = curl_init();
		$header[] = "Content-Type: application/x-www-form-urlencoded";
		$query = http_build_query($params);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint . "?api_key=" . $this->api_key);
		curl_setopt($curl, CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		$request = curl_exec($curl);
		$return = ($request === FALSE) ? curl_error($curl) : $request;
		curl_close($curl);
		return $return;
	}

	/**
	 * HTTP GET method
	 *
	 * @param array Parameter yang dikirimkan
	 * @return string Response dari cURL
	 */
	public function get($params) {
		$curl = curl_init();
		$query = http_build_query($params);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint . "?api_key=" . $this->api_key . "&" . $query);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$request = curl_exec($curl);
		$return = ($request === FALSE) ? curl_error($curl) : $request;
		curl_close($curl);
		return $return;
	}

}