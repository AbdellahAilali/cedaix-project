<?php

namespace App\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    /**
     * @param UploadedFile $file
     * @param string $targetDir
     *
     * @return string
     */
    public function upload(UploadedFile $file, string $targetDir)
    {
        $extension = $file->guessClientExtension() ? $file->guessClientExtension() : 'error';
        $fileName = md5(uniqid()).'.'.$extension;

        $file->move($targetDir, $fileName);

        return $fileName;
    }
}
