<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\ImgMeta;

/**
 * Description of IptcUrlReader
 *
 * @author fbrusciano
 */
class IptcUrlReader extends IptcStringReader {

    public function __construct($stream) {

        parent::__construct(file_get_contents($stream));
    }

}
