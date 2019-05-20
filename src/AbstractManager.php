<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of AbstractManager
 *
 * @author fbrusciano
 */
abstract class AbstractManager implements InterfaceManager {

    protected $hasMeta = false;
    protected $meta = null;

    /**
     * Read the image stream
     * 
     * @example $iptc->read($reader);
     * 
     * @access public
     * @return Manager
     */
    public function read(ImgReader $reader) {

        if (($meta = $reader->read()) !== false) {
            $this->hasMeta = true;
            $this->meta = $meta;
        }

        return $this;
    }

    /**
     * Write the image stream
     * 
     * @example $iptc->write($writer, $data);
     * 
     * @access public
     * @return Manager
     */
    public abstract function write(ImgWriter $writer);

    /**
     * Return the meta array
     *
     * @example $iptc->getMetas();
     *
     * @access public
     * @return array|false
     */
    public function getMetas() {
        return ($this->hasMeta) ? $this->meta : false;
    }

    public abstract function fetch($tag);
}
