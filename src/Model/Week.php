<?php

namespace Golpilolz\StalksIOAPI\Model;

use Exception;
use Golpilolz\StalksIOAPI\StalksIOApi;

class Week implements StalksIOModelInterface{
  /** @var int */
  private $id;

  /** @var \DateTime */
  private $date;

  /** @var Buy[] */
  private $buys;

  /** @var bool */
  private $firstTimeBuy;

  private $sells;

  private $localPrice;

  /** @var array */
  private $prices;

  private $manualPreviousPattern;

  /** @var string */
  private $previousPattern;

  /** @var int */
  private $profit;

  /** @var string */
  private $advice;

  /** @var FriendWeek[] */
  private $friendWeeks;

  /** @var int */
  private $version;

  /**
   * @param string $jsonObject
   * @return Week
   * @throws Exception
   */
  public static function create(string $jsonObject): Week {
    $jsonDecoded = json_decode($jsonObject);

    $week = new static();
    $week->setId(intval($jsonDecoded->id));
    $week->setDate(\DateTime::createFromFormat(StalksIOApi::DATE_FORMAT, $jsonDecoded->date));
    $week->setBuys(Buy::createMultiple($jsonObject));
    $week->setFirstTimeBuy(boolval($jsonDecoded->buy_local_first_time));
    $week->setSells(Sell::createMultiple($jsonObject, $week->getDate()));
    $week->setLocalPrice(intval($jsonDecoded->local_price));
    $week->setPrices($jsonDecoded->prices);
    $week->setManualPreviousPattern(intval($jsonDecoded->manual_previous_pattern));
    $week->setProfit(intval($jsonDecoded->profit));
    $week->setAdvice(Advice::create($jsonObject));
    $week->setFriendWeeks(FriendWeek::createMultiple($jsonObject));
    $week->setVersion(intval($jsonDecoded->version));
    return $week;
  }

  /**
   * @return int
   */
  public function getId(): int {
    return $this->id;
  }

  /**
   * @param int $id
   * @return Week
   */
  public function setId(int $id): Week {
    $this->id = $id;
    return $this;
  }

  /**
   * @return \DateTime
   */
  public function getDate(): \DateTime {
    return $this->date;
  }

  /**
   * @param \DateTime $date
   * @return Week
   */
  public function setDate(\DateTime $date): Week {
    $this->date = $date;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getBuys() {
    return $this->buys;
  }

  /**
   * @param Buy[] $buys
   * @return Week
   */
  public function setBuys(array $buys) {
    $this->buys = $buys;
    return $this;
  }

  /**
   * @return bool
   */
  public function isFirstTimeBuy(): bool {
    return $this->firstTimeBuy;
  }

  /**
   * @param bool $firstTimeBuy
   * @return Week
   */
  public function setFirstTimeBuy(bool $firstTimeBuy): Week {
    $this->firstTimeBuy = $firstTimeBuy;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSells() {
    return $this->sells;
  }

  /**
   * @param mixed $sells
   * @return Week
   */
  public function setSells($sells) {
    $this->sells = $sells;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLocalPrice() {
    return $this->localPrice;
  }

  /**
   * @param mixed $localPrice
   * @return Week
   */
  public function setLocalPrice($localPrice) {
    $this->localPrice = $localPrice;
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
   * @return Week
   */
  public function setPrices(array $prices): Week {
    $this->prices = $prices;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getManualPreviousPattern() {
    return $this->manualPreviousPattern;
  }

  /**
   * @param mixed $manualPreviousPattern
   * @return Week
   */
  public function setManualPreviousPattern($manualPreviousPattern) {
    $this->manualPreviousPattern = $manualPreviousPattern;
    return $this;
  }

  /**
   * @return string
   */
  public function getPreviousPattern(): string {
    return $this->previousPattern;
  }

  /**
   * @param string $previousPattern
   * @return Week
   */
  public function setPreviousPattern(string $previousPattern): Week {
    $this->previousPattern = $previousPattern;
    return $this;
  }

  /**
   * @return int
   */
  public function getProfit(): int {
    return $this->profit;
  }

  /**
   * @param int $profit
   * @return Week
   */
  public function setProfit(int $profit): Week {
    $this->profit = $profit;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getAdvice() {
    return $this->advice;
  }

  /**
   * @param mixed $advice
   * @return Week
   */
  public function setAdvice($advice) {
    $this->advice = $advice;
    return $this;
  }

  /**
   * @return FriendWeek[]
   */
  public function getFriendWeeks(): array {
    return $this->friendWeeks;
  }

  /**
   * @param FriendWeek[] $friendWeeks
   * @return Week
   */
  public function setFriendWeeks(array $friendWeeks): Week {
    $this->friendWeeks = $friendWeeks;
    return $this;
  }

  /**
   * @return int
   */
  public function getVersion(): int {
    return $this->version;
  }

  /**
   * @param int $version
   * @return Week
   */
  public function setVersion(int $version): Week {
    $this->version = $version;
    return $this;
  }
}
