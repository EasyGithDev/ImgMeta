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
abstract class AbstractManager implements InterfaceManager
{

    protected $hasMeta = false;
    protected $meta = [];

    /**
     * Read the image stream
     * 
     * @example $iptc->read($reader);
     * 
     * @access public
     * @return Manager
     */
    public function read(ImgReader $reader)
    {

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
    public function getMetas()
    {
        return ($this->hasMeta) ? $this->meta : false;
    }

    /**
     *  Sanitize meta array
     * 
     * @access public
     * @return array
     */
    public function sanitize()
    {

        foreach ($this->meta as $key => $value) {
            // removing hexa crap

            $regex = <<<'END'
            /
              (
                (?: [\x00-\x7F]                 # single-byte sequences   0xxxxxxx
                |   [\xC0-\xDF][\x80-\xBF]      # double-byte sequences   110xxxxx 10xxxxxx
                |   [\xE0-\xEF][\x80-\xBF]{2}   # triple-byte sequences   1110xxxx 10xxxxxx * 2
                |   [\xF0-\xF7][\x80-\xBF]{3}   # quadruple-byte sequence 11110xxx 10xxxxxx * 3 
                ){1,100}                        # ...one or more times
              )
            | .                                 # anything else
            /x
END;

            $this->meta[$key] = preg_replace($regex, '$1', $value);
        }

        return $this;
    }

    public abstract function fetch($tag);
}
