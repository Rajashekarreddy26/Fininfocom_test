<?php

/*class Tesseract {

    public function __construct() {
        // Load necessary libraries or helpers
    }

    public function recognize($image_path) {
        $output = [];
        $return_var = 0;
        $command = "tesseract " . escapeshellarg($image_path) . " stdout";
        exec($command, $output, $return_var);

        if ($return_var != 0) {
            return "Error recognizing text.";
        }
        return implode(" ", $output);
    }
}*/

// using GD Library.
/*class Tesseract {

    public function __construct() {
        // Load necessary libraries or helpers if needed
    }

    public function recognize($image_path, $lang = 'eng', $psm = 3) {
        // Preprocess the image to enhance OCR accuracy
        $preprocessed_image = $this->preprocess_image($image_path);

        $output = [];
        $return_var = 0;

        $command = "tesseract " . escapeshellarg($preprocessed_image) . " stdout -l " . escapeshellarg($lang) . " --psm " . intval($psm);
        exec($command, $output, $return_var);

        // Clean up the temporary preprocessed image file
        if (file_exists($preprocessed_image)) {
            unlink($preprocessed_image);
        }

        if ($return_var != 0) {
            return "Error recognizing text.";
        }

        // return implode(" ", $output);
        return $output;
    }

    private function preprocess_image($image_path) {
        $image_info = getimagesize($image_path);
        $image_type = $image_info[2];

        switch ($image_type) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($image_path);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($image_path);
                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($image_path);
                break;
            default:
                return $image_path; // Return original if unsupported format
        }

        if (!$image) {
            return $image_path; // Return original if preprocessing fails
        }

        // Convert to grayscale
        imagefilter($image, IMG_FILTER_GRAYSCALE);

        // Increase contrast
        imagefilter($image, IMG_FILTER_CONTRAST, -50);

        // Save the preprocessed image to a temporary file
        $preprocessed_image_path = sys_get_temp_dir() . '/' . uniqid('preprocessed_', true) . '.jpg';
        imagejpeg($image, $preprocessed_image_path);
        imagedestroy($image);

        return $preprocessed_image_path;
    }
}*/

// using imagemagick.

class Tesseract {

    public function __construct() {
        // Load necessary libraries or helpers if needed
    }

    public function recognize($image_path, $lang = 'eng', $psm = 11) {
        // Preprocess the image to enhance OCR accuracy
        $preprocessed_image = $this->preprocess_image($image_path);

        $output = [];
        $return_var = 0;

        $command = "tesseract " . escapeshellarg($preprocessed_image) . " stdout -l " . escapeshellarg($lang) . " --psm " . intval($psm);
        exec($command, $output, $return_var);

        // Clean up the temporary preprocessed image file
        if (file_exists($preprocessed_image)) {
            unlink($preprocessed_image);
        }

        if ($return_var != 0) {
            return "Error recognizing text.";
        }

        return $output;
        // return implode(" ", $output);
    }

    private function preprocess_image($image_path) {
        $preprocessed_image_path = sys_get_temp_dir() . '/' . uniqid('preprocessed_', true) . '.jpg';

        // Using ImageMagick to preprocess the image
        $command = "convert " . escapeshellarg($image_path) . " -resize 300% -sharpen 0x1 -threshold 50% " . escapeshellarg($preprocessed_image_path);
        exec($command);

        return $preprocessed_image_path;
    }
}
