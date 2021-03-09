<?php declare(strict_types=1);

namespace Storage\UploadDriver;

use Nette;

interface IUploadDriver
{
    /**
     * @param array
     * @return IUploadDriver
     */
    function setSettings(array $settings): IUploadDriver;

    /**
     * @param string|null
     * @return IUploadDriver
     */
    function setFolder(?string $folder): IUploadDriver;

    /**
     * @return array
     */
    function getSettings(): array;

    /**
     * @return string|null
     */
    function getFolder(): ?string;

    /**
     * @param Nette\Http\FileUpload
     * @return bool
     */
    function upload(Nette\Http\FileUpload $file): bool;
}
