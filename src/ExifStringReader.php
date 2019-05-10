<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\ImgMeta;

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
        $stream = 'data://image/jpeg;base64,' . base64_encode($this->stream);
        return @exif_read_data($stream);
    }

}
