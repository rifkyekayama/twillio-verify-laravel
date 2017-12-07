<?php

namespace RifkyEkayama\Twillio\Verify;

/**
* Twillio Verify Endpoints
*
* @author Rifky Ekayama <rifky.ekayama@gmail.com>
*/

class Endpoints {
  
  private $api_key;
  
  public function __construct($api_key) {
    $this->api_key = $api_key;
  }

  /**
   * Fungsi untuk mengirimkan verifikasi nomor telepon menggunakan sms
   * 
   * @param 
   * @return response
   */
  public function sms($phone){
    $params = [
      "via" => "sms",
      "phone_number" => $phone,
      "country_code" => 62,
      "locale" => "id",
      // "custom_message" => "[ORDERAJA] Kode verifikasi anda adalah {{code}}"
    ];
    $rest_client = new RESTClient($this->api_key, 'start');
    return $rest_client->get($params);
  }

  /**
  * Fungsi untuk mengirimkan verifikasi nomor telepon menggunakan telepon
  * 
  * @param 
  * @return response
  */
 public function phone($phone){
   $params = [
     "via" => "call",
     "phone_number" => $phone,
     "country_code" => 62,
     "locale" => "id",
     // "custom_message" => "[ORDERAJA] Kode verifikasi anda adalah {{code}}"
   ];
   $rest_client = new RESTClient($this->api_key, 'start');
   return $rest_client->get($params);
 }

  /**
   * Fungsi untuk verifikasi code yang telah di kirimkan melalui sms
   * 
   * @param
   * @return
   */
  public function verify($phone, $code){
    $params = [
      "phone_number" => $phone,
      "country_code" => 62,
      "verification_code" => $code
    ];
    $rest_client = new RESTClient($this->api_key, 'check');
    return $rest_client->get($params);
  }
}