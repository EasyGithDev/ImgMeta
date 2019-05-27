<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Iptc;

/**
 * Description of IptcUrlReader
 *
 * @author fbrusciano
 */
class IptcUrlReader extends IptcStringReader {

    public function __construct($stream) {

        try {
            $content = file_get_contents($stream);
        } catch (\Exception $e) {
            $content = '';
        }

        parent::__construct($content);
    }

}
