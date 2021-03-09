<?php declare(strict_types=1);

namespace Storage\UploadDriver;

use Nette;

/**
 * Custom Move File
 */
class Move extends UploadDriver
{
    protected array $settings = ['dir' => null,];

    public function setSettings(array $settings): IUploadDriver
    {
        $settings['dir'] = (isset($settings['dir']) ? Nette\Utils\Strings::trim($settings['dir'], '\\/') : null);
        parent::setSettings($settings);
        return $this;
    }

    public function upload(Nette\Http\FileUpload $file): bool
    {
        $parent = parent::upload($file);

        if ($parent === true) {
            try {
                $dest = $this->folder == null ?
                    $this->settings['dir'] . '/' . $file->getSanitizedName()
                    : $this->settings['dir'] . '/' . $this->folder . '/' . $file->getSanitizedName();
                $file->move($dest);
                return true;
            } catch (Nette\InvalidStateException $e) {
            }
        }

        return false;
    }
}
