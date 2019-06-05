<?php

namespace ImgMeta\Exif;

class Orientation
{

    // 0 degrees – the correct orientation, no adjustment is required .
    const ORIENTATION_1 = 1;
    // 0 degrees, mirrored – image has been flipped back - to - front .
    const ORIENTATION_2 = 2;
    // 180 degrees – image is upside down .
    const ORIENTATION_3 = 3;
    // 180 degrees, mirrored – image is upside down and flipped back - to - front .
    const ORIENTATION_4 = 4;
    // 90 degrees – image is on its side .
    const ORIENTATION_5 = 5;
    // 90 degrees, mirrored – image is on its side and flipped back - to - front .
    const ORIENTATION_6 = 6;
    // 270 degrees – image is on its far side .
    const ORIENTATION_7 = 7;
    // 270 degrees, mirrored – image is on its far side and flipped back - to - front .
    const ORIENTATION_8 = 8;

    public function fix(&$image, $orientation)
    {
        if (in_array($orientation, [3, 4])) {
            $image = imagerotate($image, 180, 0);
        }
        if (in_array($orientation, [5, 6])) {
            $image = imagerotate($image, -90, 0);
        }
        if (in_array($orientation, [7, 8])) {
            $image = imagerotate($image, 90, 0);
        }
        if (in_array($orientation, [2, 5, 7, 4])) {
            imageflip($image, IMG_FLIP_HORIZONTAL);
        }
    }
}
