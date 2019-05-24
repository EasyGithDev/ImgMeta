<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta\Gps;

/**
 * Description of Point
 *
 * @author fbrusciano
 */
class Point {

    protected $deg = 0;
    protected $min = 0;
    protected $sec = 0;

    public function __construct($deg, $min, $sec) {
        $this->deg = $deg;
        $this->min = $min;
        $this->sec = $sec;
    }

    public function getDecimal() {
        return ($this->deg) + ($this->min / 60) + ($this->sec / 3600);
    }

    public static function fromArray(array $point) {
        $res1 = $res2 = $res3 = 0;
        if (isset($point[0])) {
            list($num, $div) = explode('/', $point[0]);
            $res1 = (int) $num / (int) $div;
        }
        if (isset($point[1])) {
            list($num, $div) = explode('/', $point[1]);
            $res2 = (int) $num / (int) $div;
        }
        if (isset($point[2])) {
            list($num, $div) = explode('/', $point[2]);
            $res3 = (int) $num / (int) $div;
        }
        return new Point($res1, $res2, $res3);
    }

}
