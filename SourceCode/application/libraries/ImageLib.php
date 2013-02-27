<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0 
 * 
 */
require_once('./PHPImageWorkshop/ImageWorkshop.php');

use PHPImageWorkshop\ImageWorkshop;

class ImageLib {

    /**
     * Add frame for a image as simple
     * @param string $image
     * @param string $frame
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     * @param int $degrees
     */
    public static function AddFrame($image, $frame, $x, $y, $width, $height, $degrees) {
        $frameLayer = ImageWorkshop::initFromPath($frame);
        $w = $frameLayer->getWidth();
        $h = $frameLayer->getHeight();

        $document = ImageWorkshop::initVirginLayer($w, $h);

        $imageToAdd = ImageWorkshop::initFromPath($image);
        $imageToAdd->resizeInPixel($width, $height);
        $imageToAdd->rotate($degrees);

        $document->addLayer(1, $imageToAdd, $x - $width / 2, $y - $height / 2, 'LT');

        $document->addLayer(2, $frameLayer);

        header('Content-type: image/jpeg');
        imagejpeg($document->getResult(), null, 100);
    }

    /**
     * Add image to many frame
     * @param string $image
     * @param string $frame
     * @param array $array array Frame object
     */
    public static function AddFrameArray($image, $frame, $array = array()) {
        $frameLayer = ImageWorkshop::initFromPath($frame);
        $w = $frameLayer->getWidth();
        $h = $frameLayer->getHeight();

        $document = ImageWorkshop::initVirginLayer($w, $h);

        $imageToAdd = ImageWorkshop::initFromPath($image);
        foreach ($array as $frameItem) {
            $x = $frameItem->x;
            $y = $frameItem->y;
            $width = $frameItem->width;
            $height = $frameItem->height;
            $degrees = $frameItem->degrees;
            
            $temp = clone $imageToAdd;
            $temp->resizeInPixel($width, $height);
            $temp->rotate($degrees);
            $document->addLayer(1, $temp, $x - $width / 2, $y - $height / 2, 'LT');
        }        

        $document->addLayer(2, $frameLayer);

        header('Content-type: image/jpeg');
        imagejpeg($document->getResult(), null, 100);
    }

}

?>
