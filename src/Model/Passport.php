<?php

namespace Golpilolz\StalksIOAPI\Model;

use Golpilolz\StalksIOAPI\Exception\JSONCreateException;

class Passport implements StalksIOSendToApiInterface, StalksIOModelInterface {
  /** @var string */
  private $username;

  /** @var string | null */
  private $villagerName;

  /** @var string | null */
  private $townName;

  /** @var string */
  private $friendCode;

  /** @var bool */
  private $boughtLocal;

  /** @var bool */
  private $patronLowkey;

  public function __construct() {
    $this->setBoughtLocal(true);
    $this->setPatronLowkey(false);
  }

  public static function create(string $jsonObject): Passport {
    $jsonDecoded = json_decode($jsonObject);
    $passport = new static();
    $passport->setUsername($jsonDecoded->username);
    $passport->setVillagerName($jsonDecoded->villager_name);
    $passport->setTownName($jsonDecoded->town_name);
    return $passport;
  }

  /**
   * Create JSON string from current object
   * @return string
   * @throws JSONCreateException
   */
  public function toJson(): string {
    $jsonObject = json_encode([
      "username" => $this->getUsername(),
      "villager_name" => $this->getVillagerName(),
      "town_name" => $this->getTownName(),
      "friend_code" => $this->getFriendCode(),
      "bought_local" => $this->isBoughtLocal(),
      "patron_lowkey" => $this->isPatronLowkey(),
    ]);

    if (!$jsonObject) {
      throw new JSONCreateException();
    }

    return $jsonObject;
  }

  /**
   * @return string
   */
  public function getUsername(): string {
    return $this->username;
  }

  /**
   * @param string $username
   * @return Passport
   */
  public function setUsername(string $username): Passport {
    $this->username = $username;
    return $this;
  }

  /**
   * @return string
   */
  public function getVillagerName(): string {
    return $this->villagerName;
  }

  /**
   * @param string | null $villagerName
   * @return Passport
   */
  public function setVillagerName(?string $villagerName): Passport {
    $this->villagerName = $villagerName;
    return $this;
  }

  /**
   * @return string
   */
  public function getTownName(): string {
    return $this->townName;
  }

  /**
   * @param string $townName
   * @return Passport
   */
  public function setTownName(?string $townName): Passport {
    $this->townName = $townName;
    return $this;
  }

  /**
   * @return string
   */
  public function getFriendCode(): string {
    return $this->friendCode;
  }

  /**
   * @param string $friendCode
   * @return Passport
   */
  public function setFriendCode(string $friendCode): Passport {
    $this->friendCode = $friendCode;
    return $this;
  }

  /**
   * @return bool
   */
  public function isBoughtLocal(): bool {
    return $this->boughtLocal;
  }

  /**
   * @param bool $boughtLocal
   * @return Passport
   */
  public function setBoughtLocal(bool $boughtLocal): Passport {
    $this->boughtLocal = $boughtLocal;
    return $this;
  }

  /**
   * @return bool
   */
  public function isPatronLowkey(): bool {
    return $this->patronLowkey;
  }

  /**
   * @param bool $patronLowkey
   * @return Passport
   */
  public function setPatronLowkey(bool $patronLowkey): Passport {
    $this->patronLowkey = $patronLowkey;
    return $this;
  }
}
