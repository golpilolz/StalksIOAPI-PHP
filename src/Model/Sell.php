<?php

namespace Golpilolz\StalksIOAPI\Model;

use DateTime;
use Exception;

class Sell implements StalksIOModelInterface {
  /** @var int */
  private $price;

  /** @var int */
  private $quantity;

  /** @var int */
  private $slots;

  /** @var DateTime */
  private $sellDay;

  public static function create(string $jsonObject) {
    $jsonDecoded = json_decode($jsonObject);

    $sell = new static();
    $sell->setPrice(intval($jsonDecoded->price));
    $sell->setQuantity(intval($jsonDecoded->quantity));
    $sell->setSlots(intval($jsonDecoded->slots));
    return $sell;
  }

  /**
   * @param string $jsonObject
   * @param DateTime $currentWeek
   * @return Buy[]
   * @throws Exception
   */
  public static function createMultiple(string $jsonObject, DateTime $currentWeek): array {
    $jsonDecoded = json_decode($jsonObject);

    $sells = [];

    foreach ($jsonDecoded->sells as $value) {
      $sell = self::create(json_encode($value));
      $sell->initSellDay(clone $currentWeek);
      $sells[] = $sell;
    }

    return $sells;
  }

  /**
   * @return int
   */
  public function getPrice(): int {
    return $this->price;
  }

  /**
   * @param int $price
   * @return Sell
   */
  public function setPrice(int $price): Sell {
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
   * @return Sell
   */
  public function setQuantity(int $quantity): Sell {
    $this->quantity = $quantity;
    return $this;
  }

  /**
   * @return int
   */
  public function getSlots(): int {
    return $this->slots;
  }

  /**
   * @param int $slots
   * @return Sell
   */
  public function setSlots(int $slots): Sell {
    $this->slots = $slots;
    return $this;
  }

  /**
   * @return DateTime
   */
  public function getSellDay(): DateTime {
    return $this->sellDay;
  }

  /**
   * @param DateTime $sellDay
   * @return Sell
   */
  public function setSellDay(DateTime $sellDay): Sell {
    $this->sellDay = $sellDay;
    return $this;
  }

  /**
   * @param DateTime $currentWeek
   * @throws Exception
   */
  public function initSellDay(DateTime $currentWeek) {
    $nbDays = intval(($this->getSlots() - 1) / 2) + 1;
    $isPm = intval(($this->getSlots() - 1) % 2);
    $currentWeek->setTime(0, 0, 0);
    $dateInterval = new \DateInterval(sprintf('P%dDT%dH', $nbDays, $isPm ? 12 : 0));
    $currentWeek->add($dateInterval);
    $this->setSellDay($currentWeek);
  }
}
