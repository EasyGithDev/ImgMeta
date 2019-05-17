<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of ExifStringReader
 *
 * @author fbrusciano
 */
class ExifStringReader extends ExifReader {

    public $stream;

    public function __construct($stream) {
        $this->stream = $stream;
    }

    public function read() {
        return @exif_read_data($this->stream);
    }

}
