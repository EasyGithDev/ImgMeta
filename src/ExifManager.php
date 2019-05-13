<?php

namespace ImgMeta;

/**
 * Description of ExifManager
 *
 * @author fbrusciano
 */
class ExifManager extends AbstractManager {

    public function __construct(ExifReader $reader) {
        $this->reader = $reader;
    }

    public function fetch($tag) {
        if (!$this->hasMeta) {
            return false;
        }

        return array_key_exists($tag, $this->meta) ? $this->meta[$tag] : false;
    }

    /*
      protected function arrayFlatten($array) {
      $flattern = array();
      foreach ($array as $key => $value) {
      if (is_array($value)) {
      foreach ($value as $k => $v) {
      $flattern[$key . '.' . $k] = $v;
      }
      } else {
      $flattern[$key] = $value;
      }
      }
      return $flattern;
      }
     */
}
