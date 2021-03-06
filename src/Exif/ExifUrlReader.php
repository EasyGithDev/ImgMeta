<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Exif;

/**
 * Description of ExifUrlReader
 *
 * @author fbrusciano
 */
class ExifUrlReader extends ExifStringReader {

    public function __construct($stream) {
        try {
            $content = file_get_contents($stream);
        } catch (\Exception $e) {
            $content = '';
        }
        parent::__construct('data://image/jpeg;base64,' . base64_encode($content));
    }

}
