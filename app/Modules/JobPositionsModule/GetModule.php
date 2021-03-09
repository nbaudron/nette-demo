<?php

declare(strict_types=1);

namespace App\Modules\JobPositionsModule;

use App\Modules\Includes\Config\ModuleSetup;
use App\Modules\Includes\Interfaces\getModuleInterface;

/**
 * Fire Module Infos
 */
final class GetModule extends ModuleSetup implements getModuleInterface
{
    public function registerModule(): void
    {
        $this->name = 'Job Position';
        $this->slug = 'jobPosition';
        $this->version = '0.0.1';
    }

    public function prepareDir(): void
    {
        $this->dir  = __DIR__;
        $this->frontTemplates = __DIR__ . '/Front/@Templates';
    }
}
