<?php

namespace ImgMeta;

use ImgMeta\Exif\ExifReader;
use ImgMeta\Iptc\IptcReader;

/**
 * Description of ImgData
 *
 * @author fbrusciano
 */
class ImgData {

    protected $exif = null;
    protected $iptc = null;

    public function __construct() {
        $this->exif = $this->createExifManager();
        $this->iptc = $this->createIptcManager();
    }

    public function getMetas() {
        return [
            'exif' => ($this->exif) ? $this->exif->getAssocMetas() : false,
            'iptc' => ($this->iptc) ? $this->iptc->getMetasByName() : false
        ];
    }

    public function read($stream) {

        $this->exif->read(ExifReader::getReader($stream));
        $this->iptc->read(IptcReader::getReader($stream));

        return $this;
    }

    public function getExif() {
        return $this->exif;
    }

    public function getIptc() {
        return $this->iptc;
    }

    public function createExifManager() {
        return FactoryManager::getManager(FactoryManager::EXIF);
    }

    public function createIptcManager() {
        return FactoryManager::getManager(FactoryManager::IPTC);
    }

}
