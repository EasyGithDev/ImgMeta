<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of ExifReader
 *
 * @author fbrusciano
 */
abstract class ExifReader implements ImgReader {

    public static function getReader($stream) {

        $reader = null;

        if (filter_var($stream, FILTER_VALIDATE_URL)) {
            $reader = new ExifUrlReader($stream);
        } else if (exif_imagetype('data://image/jpeg;base64,' . base64_encode($stream)) !== false) {
            $reader = new ExifStringReader($stream);
        } else if (file_exists($stream)) {
            $reader = new ExifFileReader($stream);
        }
        
        dd($reader);
        
        return $reader;
    }

    public abstract function read();
}
