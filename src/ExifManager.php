<?php

namespace ImgMeta;

/**
 * Description of ExifManager
 *
 * @author fbrusciano
 */
class ExifManager extends AbstractManager {

    public function fetch($tag) {
        if (!$this->hasMeta) {
            return false;
        }

        return array_key_exists($tag, $this->meta) ? $this->meta[$tag] : false;
    }

}
