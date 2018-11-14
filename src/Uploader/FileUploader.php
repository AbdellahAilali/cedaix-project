<?php

namespace App\Uploader;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    /**
     * @var string
     */
    private $targetDir;

    /**
     * @param string $targetDir
     */
    public function __construct(string $targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $extension = $file->guessClientExtension() ? $file->guessClientExtension() : 'error';
        $fileName = md5(uniqid()).'.'.$extension;

        $file->move($this->targetDir, $fileName);

        return $fileName;
    }
}
