<?php

namespace App\WebService;

class Speedio {

  const URL_REQ = 'https://api-publica.speedio.com.br';

  /**
   *
   * @param  string $cnpj
   * @return array
   */
  public function consultarCnpj($cnpj) {
    return $this->get('/buscarcnpj?cnpj='.$cnpj);
  }

  /**
   *
   * @param  string $resource
   * @return array
   */
  public function get($resource) {

    $endpoint = self::URL_REQ.$resource;

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET'
    ]);

    $response = curl_exec($curl);

    curl_close($curl);

    $respArray = json_decode($response, true);

    return is_array($respArray) ? $respArray : [];

  }

}
