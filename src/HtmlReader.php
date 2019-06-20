<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImgMeta;

/**
 * Description of ExifUrlReader
 *
 * @author fbrusciano
 */
class HtmlReader {

    protected $links = [];

    public function read($stream) {
        try {
            $content = file_get_contents($stream);
        } catch (\Exception $e) {
            $content = '';
        }

        $this->links = $this->linkExtractor($content);
    }

    public function getLinks() {
        return $this->links;
    }

    protected function linkExtractor($html) {
        $links = [];
        if (preg_match_all('/<img\s+.*?src=[\"\']?([^\"\' >]*\.jpe?g)[\"\']?[^>]*>/i', $html, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                array_push($links, $match[1]);
            }
        }

        return $links;
    }

}
