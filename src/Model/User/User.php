<?php

namespace Golpilolz\StalksIOAPI\Model\User;

use Golpilolz\StalksIOAPI\Model\Passport;
use Golpilolz\StalksIOAPI\Model\StalksIOModelInterface;

class User implements StalksIOModelInterface {
  /** @var int */
  private $id;

  /** @var Passport */
  private $passport;

  /** @var string */
  private $email;

  /** @var int | null */
  private $discordId;

  /** @var string */
  private $timezone;

  public static function create(string $jsonObject) {
    $jsonDecoded = json_decode($jsonObject);
    $user = new static();
    $user->setId($jsonDecoded->id);
    $user->setPassport(Passport::create($jsonObject));
    $user->setEmail($jsonDecoded->email);
    $user->setDiscordId($jsonDecoded->discord_id);
    $user->setTimezone($jsonDecoded->timezone);
    return $user;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   * @return User
   */
  public function setId(int $id): User {
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
   * @return User
   */
  public function setPassport(Passport $passport): User {
    $this->passport = $passport;
    return $this;
  }

  /**
   * @return string
   */
  public function getEmail(): string {
    return $this->email;
  }

  /**
   * @param string $email
   * @return User
   */
  public function setEmail(string $email): User {
    $this->email = $email;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getDiscordId(): ?int {
    return $this->discordId;
  }

  /**
   * @param int|null $discordId
   * @return User
   */
  public function setDiscordId(?int $discordId): User {
    $this->discordId = $discordId;
    return $this;
  }

  /**
   * @return string
   */
  public function getTimezone(): string {
    return $this->timezone;
  }

  /**
   * @param string $timezone
   * @return User
   */
  public function setTimezone(string $timezone): User {
    $this->timezone = $timezone;
    return $this;
  }
}
