<?php

namespace ImgMeta;

/**
 * Description of ImgData
 *
 * @author fbrusciano
 */
class ImgData {

    public static function getMetas($stream) {
        return [
            'EXIF' => static::getExif($stream)->read()->getMetas(),
            'IPTC' => static::getIptc($stream)->read()->getMetas()
        ];
    }

    public static function getExif($stream) {
        return FactoryManager::getManager(ExifReader::getReader($stream), FactoryManager::EXIF);
    }

    public static function getIptc($stream) {
        return FactoryManager::getManager(IptcReader::getReader($stream), FactoryManager::IPTC);
    }

}
