<?php declare(strict_types=1);

namespace App\UI\Form\Dropzone;

use Nette;

/**
 * Dropezone Extention for Form
 */
class DropzoneExt
{
    use Nette\SmartObject;

    public function getDropzoneTemplate(): string
    {
        return __DIR__ . '/Templates/main.latte';
    }
}
