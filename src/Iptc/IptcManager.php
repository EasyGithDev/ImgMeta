<?php

namespace ImgMeta\Iptc;

use ImgMeta\Iptc\IptcTags;
use ImgMeta\AbstractManager;
use ImgMeta\ImgWriter;

/**
 * Description of IptcManager
 *
 * @author fbrusciano
 */
class IptcManager extends AbstractManager
{

    /**
     * 
     */
    const META_BY_KEY = 1;
    const META_BY_NAME = 2;

    public function getMetasByKey()
    {
        return $this->getAssocMetas(self::META_BY_KEY);
    }

    public function getMetasByName()
    {
        return $this->getAssocMetas(self::META_BY_NAME);
    }

    /**
     * Return the IPTC associative array
     *
     * @example $iptc->getAssocMetas();
     *
     * @access public
     * @return array|false
     */
    public function getAssocMetas($keyType, $showEmtyTag = false)
    {
        if (!$this->hasMeta) {
            return false;
        }

        $class = new \ReflectionClass(IptcTags::class);
        $constants = $class->getConstants();

        $metas = [];
        foreach ($constants as $name => $tag) {
            $key = ($keyType == self::META_BY_KEY) ? $tag : $name;
            if (($res = $this->fetchAll($tag)) !== false || $showEmtyTag) {
                $metas[$key] = $res;
            }
        }

        return $metas;
    }

    /**
     * Set parameters you want to record in a particular tag "IPTC"
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function set($tag, $data)
    {
        $data = $this->charsetDecode($data);
        $this->meta["2#{$tag}"] = [$data];
        $this->hasMeta = true;

        return $this;
    }

    /**
     * adds an item at the beginning of the array
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function prepend($tag, $data)
    {
        $data = $this->charsetDecode($data);
        if (!empty($this->meta["2#{$tag}"])) {
            array_unshift($this->meta["2#{$tag}"], $data);
            $data = $this->meta["2#{$tag}"];
        }
        $this->meta["2#{$tag}"] = array($data);
        $this->hasMeta = true;
        return $this;
    }

    /**
     * adds an item at the end of the array
     *
     * @param Integer|const $tag  - Code or const of tag
     * @param array|mixed   $data - Value of tag
     *
     * @return Iptc object
     * @access public
     */
    public function append($tag, $data)
    {
        $data = $this->charsetDecode($data);
        if (!empty($this->meta["2#{$tag}"])) {
            array_push($this->meta["2#{$tag}"], $data);
            $data = $this->meta["2#{$tag}"];
        }
        $this->meta["2#{$tag}"] = array($data);
        $this->hasMeta = true;
        return $this;
    }

    /**
     * Return first IPTC tag by tag name
     *
     * @param Integer|const $tag - Name of tag
     *
     * @example $iptc->fetch(Iptc::KEYWORDS);
     *
     * @access public
     * @return mixed|false
     */
    public function fetch($tag)
    {
        if (isset($this->meta["2#{$tag}"])) {
            $result = $this->charsetEncode($this->meta["2#{$tag}"][0]);
            return (is_array($result)) ? array_shift($result) : $result;
        }
        return false;
    }

    /**
     * Return all IPTC tags by tag name
     *
     * @param Integer|const $tag - Name of tag
     *
     * @example $iptc->fetchAll(Iptc::KEYWORDS);
     *
     * @access public
     * @return mixed|false
     */
    public function fetchAll($tag)
    {
        if (isset($this->meta["2#{$tag}"])) {
            return $this->charsetEncode($this->meta["2#{$tag}"]);
        }
        return false;
    }

    /**
     * returns a string with the binary code
     *
     * @access public
     * @return string
     */
    public function binary()
    {
        $iptc = '';
        foreach (array_keys($this->meta) as $key) {
            $tag = str_replace("2#", "", $key);
            foreach ($this->meta[$key] as $value) {
                $iptc .= $this->iptcMakeTag(2, $tag, $value);
            }
        }
        return $iptc;
    }

    /**
     * Assemble the tags "IPTC" in character "ascii"
     *
     * @param Integer $rec - Type of tag ex. 2
     * @param Integer $dat - code of tag ex. 025 or 000 etc
     * @param mixed   $val - any caracterer
     *
     * @access public
     * @return binary source
     */
    public function iptcMakeTag($rec, $dat, $val)
    {
        //beginning of the binary string
        $iptcTag = chr(0x1c) . chr($rec) . chr($dat);
        if (is_array($val)) {
            $src = '';
            foreach ($val as $item) {
                $len = mb_strlen($item);
                $src .= $iptcTag . $this->_testBitSize($len) . $item;
            }
            return $src;
        }
        $len = mb_strlen($val);
        $src = $iptcTag . $this->_testBitSize($len) . $val;
        return $src;
    }

    /**
     * create the new image file already
     * with the new "IPTC" recorded
     *
     * @access public
     * @return boolean
     */
    public function write(ImgWriter $writer)
    {
        return $writer->write($this->binary());
    }

    /**
     * completely remove all tags "IPTC" image
     *
     * @access public
     * @return void
     */
    public function removeAllTags()
    {
        $this->hasMeta = false;
        $this->meta = [];
    }

    /**
     * It proper test to ensure that
     * the size of the values are supported within the
     *
     * @param Integer $len - size of the character
     *
     * @access public
     * @return boolean
     */
    private function _testBitSize($len)
    {
        if ($len < 0x8000) {
            return
                chr($len >> 8) .
                chr($len & 0xff);
        }
        return
            chr(0x1c) . chr(0x04) .
            chr(($len >> 24) & 0xff) .
            chr(($len >> 16) & 0xff) .
            chr(($len >> 8) & 0xff) .
            chr(($len) & 0xff);
    }

    /**
     * Decode charset utf8 before being saved
     *
     * @param String $data
     * @access private
     * @return string decoded string
     */
    private function charsetDecode($data)
    {
        $result = [];
        if (is_array($data)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($data)) as $value) {
                $result[] = (mb_detect_encoding($value, 'UTF-8', true)) ? $value : utf8_decode($value);
            }
        } else {
            return (mb_detect_encoding($data, 'UTF-8', true)) ? $data : utf8_decode($data);
        }
        return $result;
    }

    /**
     * Encode charset to utf8 before being saved
     *
     * @param String $data
     * @access private
     * @return string encoded string
     */
    private function charsetEncode($data)
    {
        $result = [];
        if (is_array($data)) {
            foreach (new \RecursiveIteratorIterator(new \RecursiveArrayIterator($data)) as $value) {
                $result[] = (mb_detect_encoding($value, 'UTF-8', true)) ? $value : utf8_encode($value);
            }
        } else {
            return (mb_detect_encoding($data, 'UTF-8', true)) ? $data : utf8_encode($data);
        }
        return $result;
    }
}
