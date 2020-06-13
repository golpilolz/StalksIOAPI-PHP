<?php

namespace Golpilolz\StalksIOAPI;

class StalksIOApiTools {
  public static function stdClassToArray(\stdClass $stdClass): array {
    return  json_decode(json_encode($stdClass), true);
  }
}
