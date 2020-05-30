<?php

namespace Golpilolz\StalksIOAPI\Exception;

use Golpilolz\StalksIOAPI\StalksIOApi;

class JSONCreateException extends \Exception {
  public function __construct(\Exception $previous = null) {
    parent::__construct("Error on create JSON Object", StalksIOApi::FAILED_CREATE_JSON_EXCEPTION, $previous);
  }

  public function __toString() {
    return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }
}
