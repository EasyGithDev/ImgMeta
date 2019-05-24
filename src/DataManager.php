<?php

namespace ImgMeta;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author fbrusciano
 */
interface DataManager {

    public function read();

    public function fetch($tag);

    public function getMetas();
}
