<?php declare(strict_types=1);

namespace Storage\UploadDriver;

use nette;

/**
 * Handle Upload file
 */
abstract class UploadDriver implements IUploadDriver
{
    protected array $settings = [];
    protected string $folder;

    public function setSettings(array $settings): IUploadDriver
    {
        $this->settings = array_replace($this->settings, $settings);
        return $this;
    }

    public function setFolder(?string $folder): IUploadDriver
    {
        if ($folder !== null) {
            $this->folder = Nette\Utils\Strings::trim($folder, '\\/');
        }

        return $this;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function getFolder(): ?string
    {
        return $this->folder;
    }

    public function upload(Nette\Http\FileUpload $file): bool
    {
        if (!$file->isOk()) {
            return false;
        }

        return true;
    }
}
