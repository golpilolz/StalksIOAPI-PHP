<?php

namespace Golpilolz\StalksIOAPI\Model;

class FriendWeek implements StalksIOModelInterface {

  /** @var int */
  private $id;

  /** @var string */
  private $username;

  /** @var array */
  private $prices;

  /** @var Advice */
  private $advice;

  public static function create(string $jsonObject): FriendWeek {
    $jsonDecoded = json_decode($jsonObject);

    $friendWeek = new static();
    $friendWeek->setId(intval($jsonDecoded->id));
    $friendWeek->setUsername($jsonDecoded->username);
    $friendWeek->setPrices($jsonDecoded->prices);
    $friendWeek->setAdvice(Advice::create($jsonObject));
    return $friendWeek;
  }

  public static function createMultiple(string $jsonObject): array {
    $jsonDecoded = json_decode($jsonObject);

    $friendWeeks = [];

    foreach ($jsonDecoded->friend_weeks as $value) {
      $friendWeeks[] = self::create(json_encode($value));
    }

    return $friendWeeks;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   * @return FriendWeek
   */
  public function setId(int $id): FriendWeek {
    $this->id = $id;
    return $this;
  }

  /**
   * @return string
   */
  public function getUsername(): string {
    return $this->username;
  }

  /**
   * @param string $username
   * @return FriendWeek
   */
  public function setUsername(string $username): FriendWeek {
    $this->username = $username;
    return $this;
  }

  /**
   * @return array
   */
  public function getPrices(): array {
    return $this->prices;
  }

  /**
   * @param array $prices
   * @return FriendWeek
   */
  public function setPrices(array $prices): FriendWeek {
    $this->prices = $prices;
    return $this;
  }

  /**
   * @return Advice
   */
  public function getAdvice(): Advice {
    return $this->advice;
  }

  /**
   * @param Advice $advice
   * @return FriendWeek
   */
  public function setAdvice(Advice $advice): FriendWeek {
    $this->advice = $advice;
    return $this;
  }
}
