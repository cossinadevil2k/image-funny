<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author HungPV <phamvanhung0818@gmail.com>
 * @version 1.0.0 
 * 
 */
require_once('./PHPImageWorkshop/ImageWorkshop.php');
require_once('./Instagraph/Instagraph.php');

use PHPImageWorkshop\ImageWorkshop;

class ImageLib {

    private $CI;

    public function __construct() {
        $this->CI = get_instance();
        $this->CI->load->library('session');
        $this->CI->load->database();
    }

    var $dirPath = './elfinder/files/resources/users';
    var $createFolders = true;
    var $backgroundColor = 'transparent'; // transparent, only for PNG (otherwise it will be white if set null)
    var $imageQuality = 100;
    var $logoPath = './images/common/waterMarkTaoAnh.png';

    /**
     * Add frame for a image as simple
     * @param string $image // Đường dẫn đến ảnh
     * @param string $frame //Đường dẫn đến frame
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     * @param int $degrees
     */
    public static function AddFrame($image, $frame, $x, $y, $width, $height, $degrees, $crop_x, $crop_y, $crop_width, $crop_height, $resize_by = '') {
        $frameLayer = ImageWorkshop::initFromPath($frame);
        $w = $frameLayer->getWidth();
        $h = $frameLayer->getHeight();

        $document = ImageWorkshop::initVirginLayer($w, $h);

        $imageToAdd = ImageWorkshop::initFromPath($image);
        //Crop        
        $position = "LT";
        $imageToAdd->cropInPixel($crop_width, $crop_height, $crop_x, $crop_y, $position);

        //Resize
        switch ($resize_by) {
            case 'width':
                $imageToAdd->resizeInPixel($width, $w * $h / $width);
                break;
            case 'height':
                $imageToAdd->resizeInPixel($width, $w * $h / $height);
                break;
            default :
                $imageToAdd->resizeInPixel($width, $height);
                break;
        }

        $imageToAdd->rotate($degrees);

        $document->addLayer(1, $imageToAdd, $x - $width / 2, $y - $height / 2, 'LT');

        $document->addLayer(2, $frameLayer);

        $data = new DateTime();
        $imageLib = new ImageLib();
        $filename = $data->getTimestamp() . '.png';

        $logoLayer = ImageWorkshop::initFromPath($imageLib->logoPath);
        //$logoLayer->resizeInPixel(105,30);
        //$logoLayer->rotate(-45);
        $document->addLayer(3, $logoLayer, 0, 0, 'RB');
        $document->save($imageLib->dirPath, $filename, $imageLib->createFolders, $imageLib->backgroundColor, $imageLib->imageQuality);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * Add image to many frame
     * @param string $image // Đường dẫn đến ảnh
     * @param string $frame // Đường dẫn đến frame
     * @param array $array array Frame object     * 
     */
    public static function AddFrameArray($image, $frame, $array = array(), $crop_x, $crop_y, $crop_width, $crop_height, $resize_by = '') {
        try {
            $frameLayer = ImageWorkshop::initFromPath($frame);
            $w = $frameLayer->getWidth();
            $h = $frameLayer->getHeight();

            $document = ImageWorkshop::initVirginLayer($w, $h);

            $imageToAdd = ImageWorkshop::initFromPath($image);
            //Crop        
            $position = "LT";
            $imageToAdd->cropInPixel($crop_width, $crop_height, $crop_x, $crop_y, $position);

            //Resize
            foreach ($array as $frameItem) {
                $x = $frameItem->x;
                $y = $frameItem->y;
                $width = $frameItem->width;
                $height = $frameItem->height;
                $degrees = $frameItem->degree;

                $temp = clone $imageToAdd;
                switch ($resize_by) {
                    case 'width':
                        $temp->resizeInPixel($width, $w * $h / $width);
                        break;
                    case 'height':
                        $temp->resizeInPixel($width, $w * $h / $height);
                        break;
                    default :
                        $temp->resizeInPixel($width, $height);
                        break;
                }
                $temp->rotate($degrees);
                $document->addLayer(1, $temp, $x - $width / 2, $y - $height / 2, 'LT');
            }

            $document->addLayer(2, $frameLayer);

            $data = new DateTime();
            $imageLib = new ImageLib();
            $filename = $data->getTimestamp() . '.png';
            $document->save($imageLib->dirPath, $filename, $imageLib->createFolders, $imageLib->backgroundColor, $imageLib->imageQuality);

            $session_id = $imageLib->CI->session->userdata('session_id');
            $arr = array(
                'image_before' => base_url() . $image,
                'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
            );
            $imageLib->CI->db->where('session_id', $session_id);
            $imageLib->CI->db->update("tbl_sessions", $arr);


            return base_url() . $imageLib->dirPath . '/' . $filename;
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return "";
        }
    }

    public static function AddWaterMark($imagePath, $array = array()) {
        $document = ImageWorkshop::initFromPath($imagePath);

        foreach ($array as $blockDetail) {
            $type = $blockDetail->type;
            if ($type == 'tBlock') {
                $blockText = $blockDetail->blockText;
                $blockFont = $blockDetail->blockFont;
                $blockFontSize = $blockDetail->blockFontSize;
                $blockStyle = $blockDetail->blockStyle;
                $blockTextDecoration = $blockDetail->blockTextDecoration;
                $blockColor = $blockDetail->blockColor;
                $blockLeft = $blockDetail->blockLeft;
                $blockTop = $blockDetail->blockTop;
                $blockDepth = $blockDetail->blockDepth;

                $waterTextLayer = ImageWorkshop::initTextLayer($blockText, './system/fonts/arial.ttf', 12, $blockColor, 0);
                $document->addLayer($blockDepth, $waterTextLayer,$blockLeft,$blockTop,'LT');
            }
            if ($type == 'cBlock') {
                $blockColor = $blockDetail->blockColor;
                $blockLeft = $blockDetail->blockLeft;
                $blockTop = $blockDetail->blockTop;
                $blockWidth = $blockDetail->blockWidth;
                $blockHeight = $blockDetail->blockHeight;
                $blockDepth = $blockDetail->blockDepth;
            }
        }

        $data = new DateTime();
        $imageLib = new ImageLib();
        $filename = $data->getTimestamp() . '.png';
        $document->save($imageLib->dirPath, $filename, $imageLib->createFolders, $imageLib->backgroundColor, $imageLib->imageQuality);
        
        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param string $inputPath
     * @return string
     */
    public static function FilterNegate($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_NEGATE);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * Hàm tăng độ sáng
     * @param string $inputPath
     * @param int $brightness
     * @return type
     */
    public static function FilterBrightness($inputPath, $brightness, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_BRIGHTNESS, $brightness);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * Hàm tạo hiệu ứng đen trắng
     * @param string $inputPath
     * @return type
     */
    public static function FilterGrayscale($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_GRAYSCALE);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * Hàm tăng độ tương phản
     * @param type $inputPath
     * @param type $contrast
     * @return type
     */
    public static function FilterContrast($inputPath, $contrast, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_CONTRAST, $contrast);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param string $inputPath
     * @param int $red
     * @param int $green
     * @param int $blue
     * @return type
     */
    public static function FilterColorize($inputPath, $red, $green, $blue, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_COLORIZE, $red, $green, $blue);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterEdgedetect($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_EDGEDETECT);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterEmboss($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_EMBOSS);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterGaussianBlur($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterSelectiveBlur($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_SELECTIVE_BLUR);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterMeanRemoval($inputPath, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_MEAN_REMOVAL);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

    /**
     * 
     * @param type $inputPath
     * @param string $filename
     * @return type
     */
    public static function FilterSmooth($inputPath, $smooth, $filename = '') {
        $ext = pathinfo($inputPath, PATHINFO_EXTENSION);
        switch ($ext) {
            case 'png':
                $image = imagecreatefrompng($inputPath);
                break;
            case 'jpg':
                $image = imagecreatefromjpeg($inputPath);
                break;
            case 'gif':
                $image = imagecreatefromgif($inputPath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($inputPath);
                break;
            default :
                break;
        }

        imagefilter($image, IMG_FILTER_SMOOTH, $smooth);
        $imageLib = new ImageLib();
        if ($filename == '') {
            $data = new DateTime();
            $filename = $data->getTimestamp() . '.' . $ext;
        }
        imagejpeg($image, $imageLib->dirPath . '/' . $filename);
        imagedestroy($image);

        $session_id = $imageLib->CI->session->userdata('session_id');
        $arr = array(
            'image_before' => base_url() . $image,
            'image_after' => base_url() . $imageLib->dirPath . '/' . $filename
        );
        $imageLib->CI->db->where('session_id', $session_id);
        $imageLib->CI->db->update("tbl_sessions", $arr);

        return base_url() . $imageLib->dirPath . '/' . $filename;
    }

}

?>
