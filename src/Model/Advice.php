<?php

namespace Golpilolz\StalksIOAPI\Model;

class Advice implements StalksIOModelInterface {
  /** @var array */
  private $odds;

  /** @var bool */
  private $sell;

  /** @var string */
  private $advice;

  /** @var  */
  private $prediction;

  public static function create(string $jsonObject): Advice {
    $jsonDecoded = json_decode($jsonObject)->advice;

    $advice = new static();
    $advice->setOdds(json_decode(json_encode($jsonDecoded->odds), true));
    $advice->setSell(boolval($jsonDecoded->sell));
    $advice->setAdvice($jsonDecoded->advice);
    return $advice;
  }

  /**
   * @return array
   */
  public function getOdds(): array {
    return $this->odds;
  }

  /**
   * @param array $odds
   * @return Advice
   */
  public function setOdds(array $odds): Advice {
    $this->odds = $odds;
    return $this;
  }

  /**
   * @return bool
   */
  public function isSell(): bool {
    return $this->sell;
  }

  /**
   * @param bool $sell
   * @return Advice
   */
  public function setSell(bool $sell): Advice {
    $this->sell = $sell;
    return $this;
  }

  /**
   * @return string
   */
  public function getAdvice(): string {
    return $this->advice;
  }

  /**
   * @param string $advice
   * @return Advice
   */
  public function setAdvice(string $advice): Advice {
    $this->advice = $advice;
    return $this;
  }
}
