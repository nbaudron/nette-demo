<?php

declare(strict_types=1);

namespace App\Modules\Includes\Config;

use app\Modules;

/**
 * Fire Modules Info
 */
class ModuleSetup
{
    public string $slug;
    public string $name;
    public string $version;
    public string $dir;
    public string $frontTemplates;

    public function __construct()
    {
        $this->dispach();
    }

    private function dispach() : void
    {
        $this->registerModule();
        $this->prepareDir();
    }
}