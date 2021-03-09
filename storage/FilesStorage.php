<?php declare(strict_types=1);
namespace Storage;

use Nette;
use Storage\UploadDriver;

/**
 * Custom File Storage
 */
class FilesStorage
{
    public UploadDriver\Move $uploadDriver;

    public static function save(Nette\Http\FileUpload $file, string $target, string $dir = ''): void
    {
        // Prepare Dir
        $dir = $dir != ''? ['dir' => $dir] : ['dir' => __DIR__];

        // handle File
        $uploadDriver = new UploadDriver\Move;
        $uploadDriver->setSettings($dir);
        $uploadDriver->setFolder($target);
        $uploadDriver->upload($file);
    }
}
