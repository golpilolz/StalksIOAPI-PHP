<?php

namespace Golpilolz\StalksIOAPI\Model;

class Passport {
  private $username;
  private $villagerName;
  private $townName;
  private $friendCode;
  /** @var bool */
  private $boughtLocal;
  /** @var bool */
  private $patronLowkey;

  public function __construct() {
    $this->setBoughtLocal(true);
    $this->setPatronLowkey(false);
  }

  /**
   * @return mixed
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * @param mixed $username
   * @return Passport
   */
  public function setUsername($username) {
    $this->username = $username;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getVillagerName() {
    return $this->villagerName;
  }

  /**
   * @param mixed $villagerName
   * @return Passport
   */
  public function setVillagerName($villagerName) {
    $this->villagerName = $villagerName;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getTownName() {
    return $this->townName;
  }

  /**
   * @param mixed $townName
   * @return Passport
   */
  public function setTownName($townName) {
    $this->townName = $townName;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFriendCode() {
    return $this->friendCode;
  }

  /**
   * @param mixed $friendCode
   * @return Passport
   */
  public function setFriendCode($friendCode) {
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
