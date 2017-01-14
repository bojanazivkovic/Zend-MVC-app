<?php

class Application_Model_Promenisliku
{
public function upload() {
        $errors = 0;
        $image = $this->name;
        $uploadedfile = $this->tmp_name;
        $img = "";
        if ($image) {
            $filename = stripslashes($image);
            $extension = $this->getExtension($filename);
            $extension = strtolower($extension);
            if (($extension != "jpg") && ($extension != "jpeg") &&
                    ($extension != "png") && ($extension != "gif")) {
                $errors = 1;
            } else {
                $size = filesize($uploadedfile);
                if ($extension == "jpg" || $extension == "jpeg") {
                    $src = imagecreatefromjpeg($uploadedfile);
                } else if ($extension == "png") {
                    $src = imagecreatefrompng($uploadedfile);
                } else {
                    $src = imagecreatefromgif($uploadedfile);
                }
                list($width, $height) = getimagesize($uploadedfile);
                $newwidth = 433;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);

                imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                $img = time() . '-' . $image;

                $filename = $this->destination . "/" . $img;
                imagejpeg($tmp, $filename, 160);
                imagedestroy($src);
                imagedestroy($tmp);
            }
        }
        //If no errors registred, print the success message
        if ($errors == 0) {
            return $img;
        } else {
            return 0;
        }
    }

    function getExtension($str) {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

}
