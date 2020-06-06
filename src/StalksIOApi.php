<?php

namespace Golpilolz\StalksIOAPI;

use Golpilolz\StalksIOAPI\Model\Friend;
use Golpilolz\StalksIOAPI\Model\Passport;
use Golpilolz\StalksIOAPI\Model\User\Profile;
use Golpilolz\StalksIOAPI\Model\User\User;
use Golpilolz\StalksIOAPI\Model\Week;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class StalksIOApi {
  const API_URL = "https://stalks.io/api/";
  const DATE_FORMAT = "Y-m-d";

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

  // Weeks
  public function currentWeek(): Week {
    $now = new \DateTime();
    $now->modify('last Sunday');
    return $this->week($now);
  }

  public function week(\DateTime $dateTime): Week {
    $res = $this->guzzleClient->get('stalks/weeks/by_date', [
      'query' => [
        'date' => $dateTime->format(self::DATE_FORMAT)
      ]
    ]);

    return Week::create($res->getBody());
  }

  public function createWeek(Week $week) {
    $res = $this->guzzleClient->post('stalks/weeks', [
      'query' => [
        'date' => $week->getDate()->format(self::DATE_FORMAT),
        'buys' => [],
        'buy_local_first_time' => null,
        'local_price' => null,
        'prices' => [],
        'sells' => []
      ]
    ]);
  }

  public function updateWeek(Week $week) {

  }
  // End Weeks

  // Friends
  public function friends(): array {
    $res = $this->guzzleClient->get('accounts/friends');

    return Friend::createMultiple($res->getBody());
  }

  public function addFriend(Friend $friend) {
    $res = $this->guzzleClient->post('accounts/friends', [
      'query' => [
        'username' => $friend->getUsername()
      ]
    ]);
  }

  public function deleteFriend(Friend $friend) {
    $res = $this->guzzleClient->delete('accounts/friends/' . $friend->getId());
  }
  // End Friends

  // User Profile
  public function getUserProfile(string $username): Profile {
    $res = $this->guzzleClient->get('stalks/profile/' . $username);

    return Profile::create($res->getBody());
  }

  public function currentUser(): User {
    $res = $this->guzzleClient->get('accounts/current_user/');

    return User::create($res->getBody());
  }

  public function updatePassport(Passport $passport) {
    $res = $this->guzzleClient->post('accounts/update_passport/', [
      RequestOptions::JSON => $passport->toArray()
    ]);

    echo $res->getBody();
  }
  // End User Profile
}
