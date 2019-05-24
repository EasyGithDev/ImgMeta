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
    protected $ref = 1;

    const N_REF = 1;
    const S_REF = -1;
    const E_REF = 1;
    const O_REF = -1;

    public function __construct($deg, $min, $sec, $ref) {
        $this->deg = $deg;
        $this->min = $min;
        $this->sec = $sec;
        $this->ref = $ref;
    }

    public function getDecimal() {
        return $this->ref * round(($this->deg) + ($this->min / 60) + ($this->sec / 3600), 6);
    }

    public static function refFromString(string $ref) {
        switch ($ref) {
            case 'N':
                return self::N_REF;
            case 'S':
                return self::S_REF;
            case 'E':
                return self::E_REF;
            case '0':
                return self::O_REF;
            default :
                return 1;
        }
    }

    public static function fromArray(array $point, string $ref = '') {
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
        return new Point($res1, $res2, $res3, static::refFromString($ref));
    }

}
