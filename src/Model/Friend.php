<?php

namespace Golpilolz\StalksIOAPI\Model;

class Friend implements StalksIOModel {
  /** @var int */
  private $id;

  /** @var string */
  private $username;

  /** @var string | null */
  private $villagerName;

  /** @var string | null */
  private $townName;

  /** @var int | null */
  private $patronLevel;

  public function __construct() {
    $this->setId(0);
  }

  public static function create(string $jsonObject): Friend {
    $jsonDecoded = json_decode($jsonObject);
    $friend = new static();
    $friend->setId(intval($jsonDecoded->id));
    $friend->setUsername($jsonDecoded->username);
    $friend->setVillagerName($jsonDecoded->villager_name);
    $friend->setTownName($jsonDecoded->town_name);
    $friend->setPatronLevel($jsonDecoded->patron_level);
    return $friend;
  }

  /**
   * @param string $jsonObject
   * @return Friend[]
   */
  public static function createMultiple(string $jsonObject): array {
    $jsonDecoded = json_decode($jsonObject);

    $friends = [];

    foreach ($jsonDecoded as $value) {
      $friends[] = self::create(json_encode($value));
    }

    return $friends;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   * @return Friend
   */
  public function setId(int $id): Friend {
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
   * @return Friend
   */
  public function setUsername(string $username): Friend {
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
   * @param string $villagerName
   * @return Friend
   */
  public function setVillagerName(?string $villagerName): Friend {
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
   * @return Friend
   */
  public function setTownName(?string $townName): Friend {
    $this->townName = $townName;
    return $this;
  }

  /**
   * @return int
   */
  public function getPatronLevel(): int {
    return $this->patronLevel;
  }

  /**
   * @param int $patronLevel
   * @return Friend
   */
  public function setPatronLevel(?int $patronLevel): Friend {
    $this->patronLevel = $patronLevel;
    return $this;
  }
}
