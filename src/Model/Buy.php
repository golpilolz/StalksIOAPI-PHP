<?php

namespace Golpilolz\StalksIOAPI\Model;

class Buy implements StalksIOModelInterface {
  /** @var bool */
  private $local;

  /** @var string | null */
  private $label;

  /** @var int */
  private $price;

  /** @var int */
  private $quantity;

  public static function create(string $jsonObject): Buy {
    $jsonDecoded = json_decode($jsonObject);

    $buy = new static();
    $buy->setLocal(boolval($jsonDecoded->local));
    $buy->setLabel($jsonDecoded->label);
    $buy->setPrice(intval($jsonDecoded->price));
    $buy->setQuantity(intval($jsonDecoded->quantity));
    return $buy;
  }

  /**
   * @param string $jsonObject
   * @return Buy[]
   */
  public static function createMultiple(string $jsonObject): array {
    $jsonDecoded = json_decode($jsonObject);

    $buys = [];

    foreach ($jsonDecoded->buys as $value) {
      $buys[] = self::create(json_encode($value));
    }

    return $buys;
  }

  /**
   * @return bool
   */
  public function isLocal(): bool {
    return $this->local;
  }

  /**
   * @param bool $local
   * @return Buy
   */
  public function setLocal(bool $local): Buy {
    $this->local = $local;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getLabel(): ?string {
    return $this->label;
  }

  /**
   * @param string|null $label
   * @return Buy
   */
  public function setLabel(?string $label): Buy {
    $this->label = $label;
    return $this;
  }

  /**
   * @return int
   */
  public function getPrice(): int {
    return $this->price;
  }

  /**
   * @param int $price
   * @return Buy
   */
  public function setPrice(int $price): Buy {
    $this->price = $price;
    return $this;
  }

  /**
   * @return int
   */
  public function getQuantity(): int {
    return $this->quantity;
  }

  /**
   * @param int $quantity
   * @return Buy
   */
  public function setQuantity(int $quantity): Buy {
    $this->quantity = $quantity;
    return $this;
  }
}
