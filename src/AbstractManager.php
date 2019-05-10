<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\ImgMeta;

use App\ImgMeta\DataManager;

/**
 * Description of AbstractManager
 *
 * @author fbrusciano
 */
abstract class AbstractManager implements DataManager {

    protected $streamReader = null;
    protected $hasMeta = false;
    protected $meta = null;

    /**
     * Read the image stream
     * 
     * @example $iptc->read();
     * 
     * @access public
     * @return IptcManager
     */
    public function read() {

        if (($meta = $this->streamReader->read()) !== false) {
            $this->hasMeta = true;
            $this->meta = $meta;
        }

        return $this;
    }

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
