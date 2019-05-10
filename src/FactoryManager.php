<?php


namespace ImgMeta;

/**
 * Description of FactoryManager
 *
 * @author fbrusciano
 */
class FactoryManager {

    const EXIF = 1;
    const IPTC = 2;

    public static function getManager($stream, $manager) {
        switch ($manager) {
            case self::EXIF:
                return new ExifManager($stream);
            case self::IPTC:
                return new IptcManager($stream);
        }
    }

}
