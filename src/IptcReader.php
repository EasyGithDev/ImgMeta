<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of IptcReader
 *
 * @author fbrusciano
 */
abstract class IptcReader implements ImgReader {

    public static function getReader($stream) {

        $reader = null;

        if (filter_var($stream, FILTER_VALIDATE_URL)) {
            $reader = new IptcUrlReader($stream);
        } else if (($pos = mb_strpos($stream, 'data:image/jpeg;base64')) !== false) {
            $reader = new IptcStringReader(str_replace('data:image/jpeg', 'data://image/jpeg', $stream));
        } else if (exif_imagetype('data://image/jpeg;base64,' . base64_encode($stream)) !== false) {
            $reader = new IptcStringReader($stream);
        } else if (file_exists($stream)) {
            $reader = new IptcFileReader($stream);
        }

        return $reader;
    }

    public abstract function read();
}
