<?php


namespace ImgMeta;

use ImgMeta\Exif\ExifManager;
use ImgMeta\Iptc\IptcManager;

/**
 * Description of FactoryManager
 *
 * @author fbrusciano
 */
class FactoryManager {

    const EXIF = 1;
    const IPTC = 2;

    public static function getManager($manager) {
        switch ($manager) {
            case self::EXIF:
                return new ExifManager();
            case self::IPTC:
                return new IptcManager();
        }
    }

}
