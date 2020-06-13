<?php

namespace Golpilolz\StalksIOAPI\Model;

use Golpilolz\StalksIOAPI\StalksIOApiTools;

class Advice implements StalksIOModelInterface {
  /** @var array */
  private $odds;

  /** @var bool */
  private $sell;

  /** @var string */
  private $advice;

  /** @var Prediction */
  private $prediction;

  public function __construct() {
    $this->odds = [];

    $this->prediction = new Prediction();
  }

  public static function create(string $jsonObject): Advice {
    $jsonDecoded = json_decode($jsonObject)->advice;

    $advice = new static();
    if (!is_null($jsonDecoded->odds)) {
      $advice->setOdds(StalksIOApiTools::stdClassToArray($jsonDecoded->odds));
    }

    $advice->setSell(boolval($jsonDecoded->sell));
    $advice->setAdvice($jsonDecoded->advice);

    if (!is_null($jsonDecoded->prediction)) {
      $advice->setPrediction(Prediction::create($jsonObject));
    }
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

  /**
   * @return mixed
   */
  public function getPrediction() {
    return $this->prediction;
  }

  /**
   * @param mixed $prediction
   * @return Advice
   */
  public function setPrediction($prediction) {
    $this->prediction = $prediction;
    return $this;
  }
}
