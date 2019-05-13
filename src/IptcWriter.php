<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of IptcWriter
 *
 * @author fbrusciano
 */
class IptcWriter implements ImgWriter {

    protected $stream;

    public function __construct($stream) {
        $this->stream = $stream;
    }

    /**
     * create the new image file already
     * with the new "IPTC" recorded
     *
     * @access public
     * @return boolean
     */
    public function write($data) {
        //@see http://php.net/manual/pt_BR/function.iptcembed.php
        $content = iptcembed($data, $this->stream, 0);
        if ($content === false) {
            throw new \Exception(
            'Failed to save IPTC data into file'
            );
        }
        return file_put_contents($this->stream, $content) !== false;
    }

}
