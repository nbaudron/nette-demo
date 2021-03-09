<?php declare(strict_types=1);

namespace App\UI\Form;

use Contributte\FormsBootstrap\BootstrapForm;
use Nette;

/**
 * Load Custom BootstrapForm Extension (contributte/forms-bootstrap)
 */
class FormFactory
{
    use Nette\SmartObject;

    public function create(): BootstrapForm
    {
        return new BootstrapForm;
    }
}
