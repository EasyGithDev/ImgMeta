<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of ExifUrlReader
 *
 * @author fbrusciano
 */
class ExifUrlReader extends ExifStringReader {

    public function __construct($stream) {
        parent::__construct('data://image/jpeg;base64,' . base64_encode(file_get_contents($stream)));
    }

}
