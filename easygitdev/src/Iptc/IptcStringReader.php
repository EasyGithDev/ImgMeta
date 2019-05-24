<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Iptc;

/**
 * Description of ExifFileReader
 *
 * @author fbrusciano
 */
class IptcStringReader extends IptcReader {

    public $stream;

    public function __construct($stream) {
        $this->stream = $stream;
    }

    public function read() {
        $size = getimagesizefromstring($this->stream, $imageinfo);
        if (!isset($imageinfo["APP13"])) {
            return false;
        }

        return iptcparse($imageinfo["APP13"]);
    }

}
