<?php

namespace App\Framework;



/**
 * Class Upload
 */
class Upload extends Request
{
    private $picture;


    /**
     * @param mixed $target
     * 
     * @return void
     */
    public function uploadFile($target) //uploadPicture
    {
        $target_dir = $target === "user" ? USER_PICTURE : POST_PICTURE;
        $this->picture = $this->files->getParameter('userfile');
        $target_file = $target_dir . basename($this->picture["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (!empty($this->picture['name'])) {
            if (file_exists($target_file)) {
                chmod($target_file, 0755);
                unlink($target_file);
            }

            if ($this->picture["size"] > 1000000) {
                $uploadOk = 0;
            }

            if (!in_array($imageFileType, $allowedExt)) {
                $uploadOk = 0;
            } else {
                if ($uploadOk !== 0) {
                    if (move_uploaded_file($this->picture["tmp_name"], $target_file)) {
                        $name = basename($this->picture["name"]);
                        return $name;
                    }
                }   
            }
        }
    }
}
