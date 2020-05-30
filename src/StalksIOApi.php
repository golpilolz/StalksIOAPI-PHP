<?php

namespace Golpilolz\StalksIOAPI;

use Golpilolz\StalksIOAPI\Model\Week;
use GuzzleHttp\Client;

class StalksIOApi {
  const API_URL = "https://stalks.io/api/";

  /** @var string */
  private $token;
  private $guzzleClient;

  public function __construct(string $token) {
    $this->token = $token;
    $this->guzzleClient = new Client([
      'base_uri' => self::API_URL,
      'headers' => [
        'Authorization' => 'Token ' . $this->token,
      ],
    ]);
  }

  public function currentWeek() {
    $now = new \DateTime();
    $now->modify('last Sunday');
    return $this->week($now);
  }

  public function week(\DateTime $dateTime) {
    $res = $this->guzzleClient->get('stalks/weeks/by_date', [
      'query' => [
        'date' => $dateTime->format('Y-m-d')
      ]
    ]);

    $week = Week::create($res->getBody());

    return $res->getBody();
  }
}
