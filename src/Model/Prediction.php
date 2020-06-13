<?php

namespace Golpilolz\StalksIOAPI\Model;

use Golpilolz\StalksIOAPI\StalksIOApiTools;

class Prediction implements StalksIOModelInterface {

  /** @var array */
  private $likely;

  /** @var array */
  private $possible;

  public function __construct() {
    $this->likely = [];
    $this->possible = [];
  }

  public static function create(string $jsonObject): Prediction {
    $jsonDecoded = json_decode($jsonObject);
    $prediction = new static();
    if (!is_null($jsonDecoded->likely)) {
      $prediction->setLikely(StalksIOApiTools::stdClassToArray($jsonDecoded->likely));
    }
    if (!is_null($jsonDecoded->possible)) {
      $prediction->setPossible(StalksIOApiTools::stdClassToArray($jsonDecoded->possible));
    }
    return $prediction;
  }

  /**
   * @return array
   */
  public function getLikely(): array {
    return $this->likely;
  }

  /**
   * @param array $likely
   * @return Prediction
   */
  public function setLikely(array $likely): Prediction {
    $this->likely = $likely;
    return $this;
  }

  /**
   * @return array
   */
  public function getPossible(): array {
    return $this->possible;
  }

  /**
   * @param array $possible
   * @return Prediction
   */
  public function setPossible(array $possible): Prediction {
    $this->possible = $possible;
    return $this;
  }
}
