<?php

namespace Golpilolz\StalksIOAPI\Model\User;

use Golpilolz\StalksIOAPI\Model\Passport;
use Golpilolz\StalksIOAPI\Model\StalksIOModelInterface;

class Profile implements StalksIOModelInterface {
  /** @var int */
  private $id;

  /** @var Passport */
  private $passport;

  public static function create(string $jsonObject): Profile {
    $jsonDecoded = json_decode($jsonObject);
    $profile = new static();
    $profile->setId($jsonDecoded->id);
    $profile->setPassport(Passport::create($jsonObject));
    return $profile;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   * @return Profile
   */
  public function setId(int $id): Profile {
    $this->id = $id;
    return $this;
  }

  /**
   * @return Passport
   */
  public function getPassport(): Passport {
    return $this->passport;
  }

  /**
   * @param Passport $passport
   * @return Profile
   */
  public function setPassport(Passport $passport): Profile {
    $this->passport = $passport;
    return $this;
  }
}
