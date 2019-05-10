<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\ImgMeta;

/**
 * Description of ExifFileReader
 *
 * @author fbrusciano
 */
class IptcFileReader extends IptcReader {

    public $stream;

    public function __construct($stream) {
        $this->stream = $stream;
    }

    public function read() {
        $size = getimagesize($this->stream, $imageinfo);
        if (!isset($imageinfo["APP13"])) {
            return false;
        }

        return iptcparse($imageinfo["APP13"]);
    }

}
